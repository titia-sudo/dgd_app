
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card shadow-xl " style="background-color:#3498DB;"  >
                    <div class="card-body p-3">
                        <div class="row text-white ">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS</p>
                                    <h2 class="font-weight-bolder text-white">
                                        286
                                    </h2>
                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card bg-success shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS VALIDES</p>
                                    <h2 class="font-weight-bolder text-white">
                                        260
                                    </h2>
                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card bg-danger shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS REJETES</p>
                                    <h2 class="font-weight-bolder text-white">
                                        15
                                    </h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card bg-warning shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS EN COURS</p>
                                    <h2 class="font-weight-bolder text-white">
                                        11
                                    </h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- la partie   alerte-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                 @endforeach
                </ul>
            </div>
        @endif
        <!-- fin de la partie   alerte-->

    <!-- partie   contenu de l'administation-->
    <div class="container-fluid ">
        
        <!-- DataTales Example -->
        <div class="row shadow-lg mt-5">
            <div class="col-2 text-start">
            
                <a class="btn btn-primary" href="{{ route('users.index') }}"> liste user</a>
            </div>
            <div class="col-10">
                 <h4 class="m-0 font-weight-bold text-black">Ajout d'un nouveau utilisateur</h4><br>
            </div>
            
        </div>
        <hr>
            <form action="{{ route('users.store') }}" method="POST">
                 @csrf
                    <div class="container shadow col-9 p-6 ">
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nom d'utilisateur:</strong>
                                <input type="text" name="username" class="form-control" placeholder="Saisissez votre nom d'utilisateur">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Prénom:</strong>
                                <input type="text" name="firstname" class="form-control" placeholder="Saisissez votre nom">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nom:</strong>
                                <input type="text" name="lastname" class="form-control" placeholder="Saisissez votre prénom">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>password:</strong>
                                <input type="text" name="password" class="form-control" placeholder="Saisissez votre mot de passe">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="email" class="form-control" placeholder="Saisissez votre email">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>profile:</strong>
                                
                                <select name="idProfil" id="idProfil" class="form-control">
                                <option value="" selected>Veuillez choisir...</option>
                                 @foreach($profils as $profil)
                                        <option value="{{ $profil->id }}">{{ $profil->nomProfil }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Service:</strong>
                                <select name="idService" id="idService" class="form-control">
                                <option value="" selected>Veuillez choisir...</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->nomService }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">Enregister</button>
                                 </div>
                        </div>
                    </div>
                </form>
    
    </div>

</div>
       
        @include('layouts.footers.auth.footer')
    </div>
<<<<<<< HEAD
@endif
   
<form action="{{ route('users.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom d'utilisateur:</strong>
                <input type="text" name="username" class="form-control" placeholder="Saisissez votre nom d'utilisateur">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>firstname:</strong>
                <input type="text" name="firstname" class="form-control" placeholder="Saisissez votre nom">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>lastname:</strong>
                <input type="text" name="lastname" class="form-control" placeholder="Saisissez votre prénom">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>password:</strong>
                <input type="text" name="password" class="form-control" placeholder="Saisissez votre mot de passe">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Saisissez votre email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <option value="" selected>Veuillez choisir le service</option>
                <select name="idService" id="idService" class="form-control">
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->nomService }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="role">Rôle</label>
                <select name="role" id="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="permissions">Permissions</label>
                    <select name="permissions[]" id="permissions" class="form-control" multiple>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->display_name }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
                <button type="submit" class="btn btn-primary">Enregister</button>
        </div>
    </div>
   
</form>
@endsection
=======
@endsection
>>>>>>> DGD_app/main
