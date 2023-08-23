@extends('niveauTraitement.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajout de niveau de traitement</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('niveauTraitements.index') }}"> Back</a>
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
   
<form action="{{ route('niveauTraitements.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom niveau:</strong>
                <input type="text" name="nomNiveau" class="form-control" placeholder="Niveau de traitement">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <option value="" selected>Veuillez choisir...</option>
                <select name="idTempsTraitement" id="idTempsTraitement" class="form-control">
                    @foreach($tempsTraitements as $tempsTraitement)
                        <option value="{{ $tempsTraitement->id }}">{{ $tempsTraitement->nombreTempsTraitement }} {{ $tempsTraitement->UniteTempsTraitement->designationUniteTempsTraitement }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enregister</button>
        </div>
    </div>
   
</form>
@endsection

@section('scripts')
<script>

</script>
@endsection
