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
    <!-- partie   contenu de l'administation-->


    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Dossier/</span> Détails du dossier</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('admin.dossiers.index') }}"> Retour</a>
                            <small class="text-muted float-end">Détails dossiers</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Nom dossier:</h6>
                                </label>
                                {{ $dossier->nomDossier }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Déclarant:</h6>
                                </label>
                                {{ $dossier->declarantDossier }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>IFU:</h6>
                                </label>
                                {{ $dossier->ifuDossier }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Statut:</h6>
                                </label>
                                {{ $dossier->statutDossier }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Utilisateur:</h6>
                                </label>
                                @foreach($users as $user)
                                {{ $user->idUser }}
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Type de dossier:</h6>
                                </label>
                                @foreach($typeDossiers as $typeDossier)
                                {{ $typeDossier->designationTypeDossier }}
                                @endforeach
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