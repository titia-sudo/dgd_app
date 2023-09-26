
@extends('layouts.app-user', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    
    <!-- partie   contenu de l'administation-->
<div class="container-fluid">

  <!-- DataTales Example -->
    <div class="row text-center mt-7">
        <h4 class="m-0 font-weight-bold text-black">Liste des dossiers</h4>
    </div>
    <hr>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <div class="row shadow mt-3">
       
    <form method="GET" action="{{ route('Filtrerdoc') }}" id="filtrageUser">
       <div class="row shadow mt-6">
        <div class="col-md-2">
                <div>
                    <h5>FILTRE :</h5>
                </div>
            </div>
            <div class="col-md-2 ">
                    <label> <h6>Date de Creation</h6>
                        <input type="date" name="dateCreation" class="form-control" value="{{ request('dateCreation') }}">
                    </label>
            </div>
            <div class="col-md-2 ">
                <label><h6>Déclarant:</h6>
                    <input type="text" name="declarant" class="form-control" value="{{ request('declarant') }}">
                 </label>
            </div>
            <div class="col-md-2 ">
                <label><h6>IFU:</h6>
                    <input type="text" name="ifu" class="form-control" value="{{ request('ifu') }}">
                 </label>
            </div>
            <div class="col-md-2 ">
                <label><h6>statut:</h6>
                <input type="text" name="statut" class="form-control" value="{{ request('statut') }}">
                 </label>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
         </div>
            
        </form>


        
    </div>

    <div class="card-body shadow">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nom Dossier</th>
                        <th>Declarant</th>
                        <th>IFU</th>
                        <th>Agrement</th>
                        <th>Destinataire</th>
                        <th>statut</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>nom Dossier</th>
                        <th>Declarant</th>
                        <th>IFU</th>
                        <th>Agrement</th>
                        <th>Destinataire</th>
                        <th>statut</th>
                        <th width="280px">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                 @foreach ($dossiers as $dossier)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $dossier->nomDossier }}</td>
                        <td>{{ $dossier->declarantDossier }}</td>
                        <td>{{ $dossier->ifuDossier }}</td>
                        <td>{{ $dossier->agrementDossier }}</td>
                        <td>{{ $dossier->destinataireDossier }}</td>
                        <td>{{ $dossier->statutDossier }}</td>
                        <td>
                        <form action="{{ route('dossiers.destroy',$dossier->id) }}" method="POST">
   
                            <a class="btn btn-info" href="{{ route('dossiers.show',$dossier->id) }}">Show</a>
    
                            <a class="btn btn-primary" href="{{ route('dossiers.edit',$dossier->id) }}">Edit</a>
                            </form>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
            {!! $dossiers->links() !!}
        </div>
    </div>
</div>
<!---fin datable exmple---->

<!-- Modal -->
<div class="modal fade" id="modalDetails-dossiers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetails-dossiersLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetails-dossiersLabel text-center">Details du dossier</h5>
            <!---gestion de la progression du tratement du dossier--->
            <label for="customRange3" class="form-label">progression</label>
              <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3">
                        <div class="spinner-grow text-warning" role="status">
                         <span class="visually-hidden">Loading...</span>
                        </div>
                           
                        <button type="button"  class="btn-close btn-danger bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div class="row shadow mt-2">
        
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
        <div class="row"> 
            
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Déclarant </label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
                 <label for="example-text-input" class="form-control-label text-lg">N° IFU</label>
              <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
            </div>
            
        </div>

        <div class="row">
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Agrément</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
             <label for="example-text-input" class="form-control-label text-lg">Destinataire</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
            </div>
            
        </div>

        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Elements de requêtte</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Textes de référence</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Appréciations</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>

        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-secondary me-md-2" type="button">Enregistrer</button>
            <button class="btn btn-primary" type="button">Soumettre</button>
      </div>
    </div>
  </div>
</div>

<!-----end modal section--->
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




