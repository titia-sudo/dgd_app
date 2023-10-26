@extends('layouts.app-user', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])

<!-- partie   contenu de l'administation-->
<div class="container">

    <!-- DataTales Example -->

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

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Dossier/</span> Création de dossier</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('demandeurs.index') }}"> Retour</a>
                            <small class="text-muted float-end">Création dossier</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('demandeurs.store') }}" method="POST">
                                @csrf
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <strong>Nom du dossier:</strong>
                                        <input type="text" name="nomDossier" class="form-control" placeholder="Saisissez le nom du dossier ">
                                    </div>
                                    <div class="col">
                                        <label for="example-text-input" class="form-control-label text-lg">Type de dossiers</label>
                                        <select name="idTypeDossier" id="idTypeDossier" class="form-control">
                                            <option value="">Veuillez selectionner ...</option>
                                            @foreach($typeDossiers as $typeDossier)
                                            <option value="{{ $typeDossier->id }}">{{ $typeDossier->designationTypeDossier }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col">
                                        <label for="example-text-input" class="form-control-label text-lg">Déclarant </label>
                                        <input type="text" name="declarantDossier" class="form-control" placeholder="Saisissez le nom du declarant" required>
                                    </div>
                                    <div class="col">
                                        <label for="example-text-input" class="form-control-label text-lg">N° IFU</label>
                                        <input type="text" name="ifuDossier" class="form-control" placeholder="Saisissez le numero IFU" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="example-text-input" class="form-control-label text-lg">Agrément</label>
                                        <input type="text" name="agrementDossier" class="form-control" placeholder="Saisissez votre agrement" required>
                                    </div>
                                    <div class="col">
                                        <label for="example-text-input" class="form-control-label text-lg">Destinataire</label>
                                        <input type="text" name="destinataireDossier" class="form-control" placeholder="Saisissez les informations du destinataire" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="">
                                        <label for="exampleFormControlTextarea1" class="form-label text-lg">Elements de requêtte</label>
                                        <textarea name="elementRequeteDossier" class="form-control" placeholder="Saisissez votre requete" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <label for="exampleFormControlTextarea1" class="form-label text-lg">Textes de référence</label>
                                        <textarea name="texteReferenceDossier" class="form-control" placeholder="saisissez les textes de reference" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-secondary me-md-2" name="action" type="submit" value="brouillon">Enregistrer</button>
                                        <button class="btn btn-primary" type="submit" name="action" value="soumettre">Soumettre</button>
                                    </div>
                                </div>
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