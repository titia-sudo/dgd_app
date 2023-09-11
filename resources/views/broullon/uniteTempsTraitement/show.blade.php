@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher unité de temps</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('uniteTempsTraitements.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Designation:</strong>
                {{ $uniteTempsTraitement->designationUniteTempsTraitement }}
            </div>
        </div>

    </div>
@endsection
