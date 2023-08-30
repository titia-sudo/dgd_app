@extends('service.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher Service</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('services.index') }}">Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom du service:</strong>
                {{ $service->nomService }}
            </div>
            <div class="form-group">
                <strong>Direction:</strong>
                {{ $service->Direction->nomDirection }}
            </div>
        </div>

    </div>
@endsection
