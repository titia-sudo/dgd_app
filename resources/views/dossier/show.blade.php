@extends('dossier.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher dossier</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nomDossier:</strong>
                {{ $dossier->nomDossier }}
            </div>
            <div class="form-group">
                <strong>declarant:</strong>
                {{ $dossier->declarantDossier }}
            </div>
            <div class="form-group">
                <strong>ifu:</strong>
                {{ $dossier->ifuDossier }}
            </div>
            <div class="form-group">
                <strong>Statut:</strong>
                {{ $dossier->statutDossier }}
            </div>
            <div class="form-group">
                <strong>Utilisateur:</strong>
                @foreach($users as $user)
                    {{ $user->idUser }}
                @endforeach
            </div>
            <div class="form-group">
                <strong>Type dossier:</strong>
                @foreach($typeDossiers as $typeDossier)
                    {{ $typeDossier->designationTypeDossier }}
                @endforeach
            </div>
        </div>

    </div>
@endsection
