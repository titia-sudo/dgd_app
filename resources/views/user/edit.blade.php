@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card shadow-xl " style="background-color:#3498DB;">
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
    <!-- partie   alerte-->
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
    <!-- partie   alerte-->
    <!-- partie   contenu de l'administation-->

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Gestion user/</span>modification utilisateur</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
                            <small class="text-muted float-end">
                                <h6>Infos de:</h6> <span class="text-primary">{{ $user->username }}_ {{ $user->lastname }} </span>
                            </small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.update',$user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Nom d'utilisateur:</h6>
                                    </label>
                                    <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Prénom:</h6>
                                    </label>
                                    <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Nom:</h6>
                                    </label>
                                    <input type="text" name="firstname" value="{{ $user->firstname }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Password:</h6>
                                    </label>
                                    <input type="password" name="password" value="{{$user->password}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Email :</h6>
                                    </label>
                                    <input type="text" name="email" value="{{$user->email}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">
                                        <h6>Rôle</h6>
                                    </label>
                                    <select id="role" class="form-control" name="role">
                                        @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->display_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">
                                        <h6>Services:</h6>
                                    </label>
                                    <select name="idService" id="idService" class="form-control">
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

</div>

@include('layouts.footers.auth.footer')
</div>
@endsection