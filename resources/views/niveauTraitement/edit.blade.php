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
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Parametre/</span> modification niveau de traitement</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('niveauTraitements.index') }}"> Retour</a>
                            <small class="text-muted float-end">Niveau de traitement</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('niveauTraitements.update',$niveauTraitement->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Designation:</h6>
                                    </label>
                                    <input type="text" name="nomNiveau" value="{{ $niveauTraitement->nomNiveau }}" class="form-control" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Temps de traitement:</h6>
                                    </label>
                                    <select name="idTempsTraitement" id="idTempsTraitement" class="form-control">
                                        @foreach($tempsTraitements as $tempsTraitement)
                                        <option {{$tempsTraitement->id==$tempsTraitement->idTempsTraitement?'selected':''}} value="{{ $tempsTraitement->id }}">{{ $tempsTraitement->nombreTempsTraitement }} {{ $tempsTraitement->UniteTempsTraitement->designationUniteTempsTraitement }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Utilisateurs:</h6>
                                    </label>
                                    <select multiple class="form-control" id="users" name="users[]" required>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ in_array($user->id, $niveauTraitement->users->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $user->firstname }} {{ $user->lastname }}</option>
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