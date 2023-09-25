
@extends('layouts.app-user', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    
    <!-- partie   contenu de l'administation-->
<div class="container">

            <!-- DataTales Example -->
       

        <div class="row shadow mt-2">
        <div class=" text-center mt-7 mb-3">
            <h4 class="m-0 font-weight-bold text-black">Editer dossier</h4>
         </div>
        
        <div class="row">
            <div class="col">
            <label for="example-text-input" class="form-control-label text-lg">Désignation</label>
              <input type="text" class="form-control" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Type de dossiers</label>
                    <select class="form-select" aria-label="multiple select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                         
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
        <div class="row"> 
            
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
           
        <div class="row mt-3">
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="button">Enregistrer</button>
         
         </div>
       </div>
    </form>
            
        </div>

        

        
    </div>

</div>

<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap');

.card{
    padding: 1.5em .5em .5em;
    border-radius: 10em;
    text-align: center;
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

</style>
       
        @include('layouts.footers.auth.footer')
    </div>
@endsection