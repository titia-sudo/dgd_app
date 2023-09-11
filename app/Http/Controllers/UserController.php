<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfilControlleur;
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

     
    public function index()
    {
        //
        $users = User::latest()->paginate(5);
        return view('user.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
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

        $profils = Profil::orderBy('nomProfil', 'ASC')->get();
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
            'lastname'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            
        ]);
  
        $user=User::create($request->all());
        Laratrust::attachRole('demandeur', $user->id);
        return redirect()->route('users.index')->with('success','user created successfully.');
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
        $profils = Profil::orderBy('nomProfil', 'ASC')->get();
        $services = Service::orderBy('nomService', 'ASC')->get();
        return view('user.show',compact('user', 'profils', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id):View
    {
        //
        $user = User::find($id);
        $profils = Profil::orderBy('nomProfil', 'ASC')->get();
        $services = Service::orderBy('nomService', 'ASC')->get();
        return view('user.edit',compact('user', 'profils', 'services'));
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
            'roles'=> 'required',
        ]);
        $user->update($request->all());
        Laratrust::detachRoles($user);
        Laratrust::attachRole('new_role', $user);
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
