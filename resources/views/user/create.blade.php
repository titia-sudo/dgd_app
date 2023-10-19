@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
@include('layouts.topnavbande') 
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

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Gestion user/</span>Ajout d'un nouveau utilisateur</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
                            <small class="text-muted float-end">Nouveau utilisateur</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Nom d'utilisateur:</h6>
                                    </label>
                                    <input type="text" name="username" class="form-control" placeholder="Saisissez votre nom d'utilisateur">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Prénom:</h6>
                                    </label>
                                    <input type="text" name="firstname" class="form-control" placeholder="Saisissez votre prénom">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Nom:</h6>
                                    </label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Saisissez votre nom">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Password:</h6>
                                    </label>
                                    <input type="text" name="password" class="form-control" placeholder="Saisissez votre mot de passe">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Email :</h6>
                                    </label>
                                    <input type="text" name="email" class="form-control" placeholder="Saisissez votre email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">
                                        <h6>Rôle</h6>
                                    </label>
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="" selected>Veuillez choisir...</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">
                                        <h6>Services:</h6>
                                    </label>
                                    <select name="idService" id="idService" class="form-control">
                                        <option value="" selected>Veuillez choisir...</option>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->nomService }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="reset" class="btn btn-secondary">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Enregister</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- / Content -->

    </div>

    @include('layouts.footers.auth.footer')
</div>
@endsection