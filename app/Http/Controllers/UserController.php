<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Direction;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfilControlleur;
use Laratrust\Models\LaratrustRole;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Role; 
use App\Models\Permission; 
use Laratrust\LaratrustFacade as Laratrust;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index(Request $request)
    {
        $dateCreation = $request->input('dateCreation', '');
        $roleId = $request->input('roleId', ''); // Récupère la valeur de 'roleId' ou une chaîne vide par défaut
        $serviceId = $request->input('serviceId');
        $idDirection = $request->input('idDirection');

        // Commencez avec une requête de base pour les utilisateurs
        $roles = Role::all();
        $services = Service::all();
        $directions = Direction::all();
        $query = User::query();
    
        // Appliquez le filtre en fonction de la date de création
        if (!empty($dateCreation)) {
           $query->whereDate('users.created_at', '=', $dateCreation); // Précisez la table 'users'
       }
    
       if (!empty($roleId)) {
            $query->whereHas('roles', function ($query) use ($roleId) {
                $query->where('roles.id', $roleId);
            });
        }

        if (!empty($serviceId)) {
           // Filtrez par service en utilisant la colonne 'idService' de la table 'users'
           $query->where('users.idService', $serviceId);
       }

       if (!empty($idDirection)) {
           $query->whereHas('service', function ($query) use ($idDirection) {
               $query->where('idDirection', $idDirection);
           });
       }

       //dd($dateCreation, $roleId, $serviceId, $idDirection, $query->toSql());
        // Paginez les résultats
        $users = $query->paginate(10); // Vous pouvez ajuster le nombre d'utilisateurs par page
    
        // Affichez la vue avec les utilisateurs filtrés
        return view('user.index', compact('dateCreation', 'roleId', 'users', 'roles', 'serviceId', 'idDirection', 'services', 'directions'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Récupérez tous les rôles depuis la base de données.
        $roles = Role::all(); 

        // Récupérez toutes les permissions depuis la base de données si nécessaire.
        $permissions = Permission::all(); 

        //$profils = Profil::orderBy('nomProfil', 'ASC')->get();
        $services = Service::orderBy('nomService', 'ASC')->get();
        return view('user.create', compact('services', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) :RedirectResponse
    {
        //
        $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
    
        $user = User::create($request->all());

        // Récupérez le nom du rôle à partir de la demande
        $roleName = $request->input('role');
    
        // Recherchez le rôle en fonction de son nom
        $role = Role::where('name', $roleName)->first();
    
        if ($role) {
            // Attachez le rôle à l'utilisateur
            $user->attachRole($role);
    
            return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
        } else {
            // Gérez le cas où le rôle n'est pas trouvé
            return redirect()->route('users.index')->with('error', 'Le rôle "' . $roleName . '" n\'a pas été trouvé.');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        //$profils = Profil::orderBy('nomProfil', 'ASC')->get();
        $services = Service::orderBy('nomService', 'ASC')->get();
        return view('user.show',compact('user', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id):View
    {
        $roles = Role::all(); 
        $user = User::find($id);
        //$profils = Profil::orderBy('nomProfil', 'ASC')->get();
        $services = Service::orderBy('nomService', 'ASC')->get();
        return view('user.edit',compact('user', 'roles','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'lastname'=> 'required',
            'email'=> 'required',
            'role'=> 'required',
        ]);
        $user->update($request->all());
        // Laratrust::detachRoles($user);
        // Laratrust::attachRole('new_role', $user);
        return redirect()->route('users.index')->with('success','user mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
  
        return redirect()->route('users.index')->with('success','user supprimé avec succès');
    }
}
