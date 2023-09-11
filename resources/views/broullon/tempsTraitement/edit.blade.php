@extends('tempsTraitement.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier la valeur du temps de traitement</h2>
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
    
    <form action="{{ route('tempsTraitements.update',$tempsTraitement->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de Temps de Traitement:</strong>
                    <input type="text" name="nombreTempsTraitement" value="{{ $tempsTraitement->nombreTempsTraitement }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="form-group"> 
                <option value=""></option>
                <select name="idUniteTempsTraitement" id="idUniteTempsTraitement" class="form-control"> 
                @foreach($uniteTempsTraitement as $uniteTempsTraitement)
                    <option {{$uniteTempsTraitement->id==$uniteTempsTraitement->idUniteTempsTraitement?'selected':''}} value="{{ $uniteTempsTraitement->id }}">{{ $uniteTempsTraitement->designationUniteTempsTraitement }}</option>
                 @endforeach    
                
                </select>
            </div>

            <div class="ol-xs-12 col-sm-6 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('tempsTraitements.index') }}"> Retour</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
   
    </form>
@endsection
