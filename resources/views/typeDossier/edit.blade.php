@extends('typeDossier.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Unite de temps</h2>
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
  
    <form action="{{ route('typeDossiers.update',$typeDossier->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Designation:</strong>
                    <input type="text" name="designationTypeDossier" value="{{ $typeDossier->designationTypeDossier }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nombre Niveau de Traitement:</strong>
                    <input type="text" name="nombreNiveauTraitement" value="{{ $typeDossier->nombreNiveauTraitement }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="ol-xs-12 col-sm-6 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('typeDossiers.index') }}"> Retour</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
   
    </form>
@endsection