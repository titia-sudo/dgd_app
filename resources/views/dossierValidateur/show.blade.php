
@extends('layouts.app-validateur', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    
    <!-- partie   contenu de l'administation-->
<div class="container-fluid">

<!-- DataTales Example -->
  <div class="row text-center mt-7">
      <h4 class="m-0 font-weight-bold text-black">Détails dossiers</h4>
  </div>
<hr>
  <div class="row shadow">
           <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('validateurs.index') }}"> Retour</a>
          </div>
  </div>

      <div class="container mt-2 shadow-lg  col-9  p-4 bg-body rounded ">
      <div class="row mb-6">
       
      <div class="row">
            <div class="col">
            <label for="example-text-input" class="form-control-label text-lg">Désignation</label>
              <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{ $dossier->nomDossier }}">
            </div>
        </div>
        <div class="row"> 
            
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Déclarant </label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{ $dossier->declarantDossier }}">
            </div>
            <div class="col">
                 <label for="example-text-input" class="form-control-label text-lg">N° IFU</label>
              <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="{{ $dossier->ifuDossier  }}">
            </div>
            
        </div>

        <div class="row">
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Agrément</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{ $dossier->agrementDossier}}">
            </div>
            <div class="col">
             <label for="example-text-input" class="form-control-label text-lg">Destinataire</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="{{ $dossier->destinataireDossier}}">
            </div>
            
        </div>

        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Elements de requêtte</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" >{{ $dossier->elementRequeteDossier }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Textes de référence</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" >{{ $dossier->texteReferenceDossier }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Appréciations</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value=""></textarea>
            </div>
        </div>

        
        </div>

          </div>

      </div>
  </div>
</div>
</div>
<!---fin datable exmple---->


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
