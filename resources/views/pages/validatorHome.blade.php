
@extends('layouts.app-validateur', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    
    <!-- partie   contenu de l'administation-->
<div class="container-fluid">

  <!-- DataTales Example -->
    <div class="row text-center mt-7">
        <h4 class="m-0 font-weight-bold text-black">Liste des dossiers</h4>
    </div>
    <div class="text-end">
            <a href="{{ route('validateurDossiers.create') }}" type="submit" class="btn btn-primary  text-white">Nouveau dossier</a>
        </div> 
    <hr>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <div class="row shadow mt-3">
       <div class="col-sm-3 col-md-3">
            <div>
                    <h5>FILTRE :</h5>
            </div>
        </div>
        <div class="col-sm-3 col-md-3 ">
            <div class="dataTables_length select" id="dataTable_length">
                <label> <h6>Date</h6>
                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
        </div>

        <div class="col-sm-3 col-md-3">
            <div class="dataTables_length select" id="dataTable_length">
                <label><h6>Statut</h6>
                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
        </div>

        <div class="col-sm-3 col-md-3">
            <div class="dataTables_length select" id="dataTable_length">
                <label><h6>Type</h6>
                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
        </div>

        
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
                        <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers" >Détails</a>
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
              <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3" value="{{ $dossier->statutDossier }}">
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
              <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{ $dossier->nomDossier }}">
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




