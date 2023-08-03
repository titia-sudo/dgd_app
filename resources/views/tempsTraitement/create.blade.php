@extends('tempsTraitement.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajout de temps de traitement</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tempsTraitements.index') }}"> Back</a>
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
   
<form action="{{ route('tempsTraitements.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombreTempsTraitement" class="form-control" placeholder="Temps de traitement">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <option value="" selected>Veuillez choisir...</option>
                <select name="idUniteTempsTraitement" id="idUniteTempsTraitement" class="form-control">
                                    @foreach($uniteTempsTraitements as $uniteTempsTraitement)
                                        <option value="{{ $uniteTempsTraitement->id }}">{{ $uniteTempsTraitement->designationUniteTempsTraitement }}</option>
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
