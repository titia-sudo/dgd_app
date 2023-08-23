@extends('uniteTempsTraitement.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajout d'une unité de temps de traitement</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('uniteTempsTraitements.index') }}"> Back</a>
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
   
<form action="{{ route('uniteTempsTraitements.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unite de temps:</strong>
                <input type="text" name="designationUniteTempsTraitement" class="form-control" placeholder="l'unité de temps de traitement">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enregister</button>
        </div>
    </div>
   
</form>
@endsection
