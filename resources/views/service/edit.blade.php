@extends('uniteTempsTraitement.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Service</h2>
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
  
    <form action="{{ route('services.update',$service->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom Service:</strong>
                    <input type="text" name="nomService" value="{{ $service->nomService }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <option value="" selected>Veuillez choisir...</option>
                <select name="idDirection" id="idDirection" class="form-control">
                    @foreach($directions as $direction)
                        <option value="{{ $direction->id }}">{{ $direction->nomDirection }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('services.index') }}"> Retour</a>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
   
    </form>
@endsection
