@extends('dossier.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Dossiers</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('dossiers.index') }}"> Back</a>
        </div>
    </div>
</div>
   
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
   
<form action="{{ route('dossiers.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom du dossier:</strong>
                <input type="text" name="nomDossier" class="form-control" placeholder="Saisissez le nom du dossier ">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Declarant:</strong>
                <input type="text" name="declarantDossier" class="form-control" placeholder="Saisissez le nom du declarant">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IFU:</strong>
                <input type="text" name="ifuDossier" class="form-control" placeholder="Saisissez le numero IFU">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agrement:</strong>
                <input type="text" name="agrementDossier" class="form-control" placeholder="Saisissez votre agrement">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Destinataire:</strong>
                <input type="text" name="destinataireDossier" class="form-control" placeholder="Saisissez les informations du destinataire">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>elementRequeteDossier:</strong>
                <input type="text" name="elementRequeteDossier" class="form-control" placeholder="Saisissez votre requete">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>texteReferenceDossier:</strong>
                <input type="text" name="texteReferenceDossier" class="form-control" placeholder="saisissez les textes de reference">
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="hidden" name="statutDossier" class="form-control" placeholder="saisissez les textes de reference">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <option value="" selected>Veuillez choisir...</option>
                <select name="idTypeDossier" id="idTypeDossier" class="form-control">
                    @foreach($typeDossiers as $typeDossier)
                        <option value="{{ $typeDossier->id }}">{{ $typeDossier->designationTypeDossier }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
            <button type="submit" class="btn btn-primary">Enregister</button>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </div>
   
</form>
@endsection
