@extends('uniteTempsTraitement.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Liste des niveau de traitement</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('niveauTraitements.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom niveauTraitement:</strong>
                {{ $niveauTraitement->nomNiveau }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de temps:</strong>
                {{ $niveauTraitement->TempsTraitement->nombreTempsTraitement }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unité de temps:</strong>
                {{ $niveauTraitement->TempsTraitement->UniteTempsTraitement->designationUniteTempsTraitement }}
            </div>
        </div>

    </div>
@endsection
