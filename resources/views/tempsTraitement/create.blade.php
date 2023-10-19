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
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Parametre/</span> Ajout de temps de traitement</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('niveauTraitements.index') }}"> Retour</a>
                            <small class="text-muted float-end">Temps traitement</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('tempsTraitements.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Nombre:</h6>
                                    </label>
                                    <input type="text" name="nombreTempsTraitement" class="form-control" placeholder="Temps de traitement">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">
                                        <h6>Unité de temps de traitement:</h6>
                                    </label>
                                    <select name="idUniteTempsTraitement" id="idUniteTempsTraitement" class="form-control">
                                        <option value="" selected>Veuillez choisir</option>
                                        @foreach($uniteTempsTraitements as $uniteTempsTraitement)
                                        <option value="{{ $uniteTempsTraitement->id }}">{{ $uniteTempsTraitement->designationUniteTempsTraitement }}</option>
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
        @include('layouts.footers.auth.footer')
    </div>
    @endsection