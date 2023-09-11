@extends('dossier.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>user</h2>
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
  
    <form action="{{ route('dossiers.update',$dossier->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nom Dossier:</strong>
                    <input type="text" name="firstname" value="{{ $dossier->nomDossier }}" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Declarant:</strong>
                    <input type="text" name="lastname" value="{{ $dossier->declarantDossier }}"class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IFU:</strong>
                <input type="text" name="password" value ="{{ $dossier->ifuDossier}}" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Statut:</strong>
                <input type="text" name="email" value ="{{$dossier->statutDossier}}" class="form-control">
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
            <div class="ol-xs-12 col-sm-6 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
   
    </form>
@endsection
