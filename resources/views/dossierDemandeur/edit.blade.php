@extends('layouts.app-user', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])

<!-- partie   contenu de l'administation-->
<div class="container">
    <hr>
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
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Dossier/</span> modification de dossiers</h5>
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('demandeurs.index') }}"> Retour</a>
                            <small class="text-muted float-end">dossier</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('demandeurs.update',$dossier->id) }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label class="form-label" for="basic-default-fullname">
                                            <h6>Nom dossier:</h6>
                                        </label>
                                        <input type="text" name="nomDossier" value="{{ $dossier->nomDossier }}" class="form-control">
                                    </div>
                                    <div class="mb-3 col">
                                        <label class="form-label" for="basic-default-fullname">
                                            <h6>Déclarant:</h6>
                                        </label>
                                        <input type="text" name="declarantDossier" value="{{ $dossier->declarantDossier }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col">
                                        <label class="form-label" for="basic-default-fullname">
                                            <h6>IFU:</h6>
                                        </label>
                                        <input type="text" name="ifuDossier" value="{{ $dossier->ifuDossier}}" class="form-control">
                                    </div>
                                    <div class="mb-3 col">
                                        <label class="form-label" for="basic-default-fullname">
                                            <h6>Statut:</h6>
                                        </label>
                                        <input type="text" name="email" value="{{$dossier->statutDossier}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label class="form-label" for="basic-default-fullname">
                                            <h6>Type dossiers:</h6>
                                        </label>
                                        <select name="idTypeDossier" id="idTypeDossier" class="form-control">
                                            @foreach($typeDossiers as $typeDossier)
                                            <option value="{{ $typeDossier->id }}">{{ $typeDossier->designationTypeDossier }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="example-text-input" class="form-control-label text-lg">Agrément</label>
                                        <input type="text" name="agrementDossier" value="{{ $dossier->agrementDossier}}" class="form-control" placeholder="Saisissez votre agrement">
                                    </div>
                                    <div class="col">
                                        <label for="example-text-input" class="form-control-label text-lg">Destinataire</label>
                                        <input type="text" name="destinataireDossier" value="{{ $dossier->destinataireDossier}}" class="form-control" placeholder="Saisissez les informations du destinataire">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <label for="exampleFormControlTextarea1" class="form-label text-lg">Elements de requêtte</label>
                                        <textarea name="elementRequeteDossier" class="form-control" placeholder="Saisissez votre requete">{{ $dossier->elementRequeteDossier}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <label for="exampleFormControlTextarea1" class="form-label text-lg">Textes de référence</label>
                                        <textarea name="texteReferenceDossier" class="form-control" placeholder="saisissez les textes de reference">{{ $dossier->texteReferenceDossier}}</textarea>
                                    </div>
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