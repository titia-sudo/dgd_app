@extends('typeDossier.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher unité de temps</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('uniteTempsTraitements.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Designation:</strong>
                {{ $typeDossier->designationTypeDossier }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Niveau de traitement:</strong>
                {{ $typeDossier->nombreNiveauTraitement }}
            </div>
        </div>

    </div>
@endsection
