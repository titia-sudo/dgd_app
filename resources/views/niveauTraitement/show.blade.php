@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    @include('layouts.topnavbande')
    <!-- partie   alerte-->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- partie   alerte-->
    <!-- partie   contenu de l'administation-->

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Parametre/</span> Détails niveau de traitement</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('niveauTraitements.index') }}"> Retour</a>
                            <small class="text-muted float-end">Détails </small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Nom niveau:</h6>
                                </label>
                                {{ $niveauTraitement->nomNiveau }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Nombre de temps:</h6>
                                </label>
                                {{ $niveauTraitement->TempsTraitement->nombreTempsTraitement }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Unité de temps:</h6>
                                </label>
                                {{ $niveauTraitement->TempsTraitement->UniteTempsTraitement->designationUniteTempsTraitement }}
                            </div>
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