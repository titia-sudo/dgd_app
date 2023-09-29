
@extends('layouts.app-validateur', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    
    <!-- partie   contenu de l'administation-->
<div class="container-fluid">

  <!-- DataTales Example -->
 
    <div class="card-body shadow">
    <div class="container-fluid">

<!-- DataTales Example -->
  <div class="row text-center mt-7">
      <h4 class="m-0 font-weight-bold text-black">Détails dossiers</h4>
  </div>
<hr>
  <div class="row shadow mt-2">
           <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('validateurs.index') }}"> Retour</a>
          </div>

      
  </div>

      <div class="container mt-6 shadow-lg  col-9  p-5 bg-body rounded ">
      <div class="row mb-6">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>nomDossier :</strong>
                  {{ $dossier->nomDossier }}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>declarant :</strong>
                  {{ $dossier->declarantDossier }}
              </div>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>IFU :</strong>
                  {{ $dossier->ifuDossier }}
              </div>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>statut :</strong>
                  {{ $dossier->statutDossier }}
              </div>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Utilisateur :</strong>
                  @foreach($users as $user)
                    {{ $user->idUser }}
                @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Type de dossier :</strong>
                  @foreach($typeDossiers as $typeDossier)
                    {{ $typeDossier->designationTypeDossier }}
                @endforeach
              </div>
          </div>
          </div>

      </div>
  </div>
</div>
    </div>
</div>
<!---fin datable exmple---->

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




