@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
@include('layouts.topnavbande') 
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