@extends('uniteTempsTraitement.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher unité de temps</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>firstname:</strong>
                {{ $user->firstname }}
            </div>
            <div class="form-group">
                <strong>lastname:</strong>
                {{ $user->lastname }}
            </div>
            <div class="form-group">
                <strong>username:</strong>
                {{ $user->username }}
            </div>
            <div class="form-group">
                <strong>email:</strong>
                {{ $user->email }}
            </div>
            <div class="form-group">
                <strong>Profil:</strong>
                @foreach($profils as $profil)
                {{ $user->idProfil }}
                {{ $user->$profil->nomProfil ?? '' }}

                @endforeach
            </div>
        </div>

    </div>
@endsection
