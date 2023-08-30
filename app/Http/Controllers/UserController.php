<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfilControlleur;

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
        //
        $profils = Profil::orderBy('nomProfil', 'ASC')->get();
        $services = Service::orderBy('nomService', 'ASC')->get();
        return view('user.create', compact('services', 'profils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'lastname'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
  
        User::create($request->all());
   
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
    public function edit(User $user)
    {
        //
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
            'password'=> 'required',
        ]);
  
        $user->update($request->all());
  
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
