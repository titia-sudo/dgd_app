@extends('layouts.app-user', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    
    <!-- partie   contenu de l'administation-->
<div class="container-fluid">

  <!-- DataTales Example -->
    <div class="row text-center mt-7">
        <h4 class="m-0 font-weight-bold text-black">Liste des dossiers</h5>
    </div>
    <hr>

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
                        <th><h6>Designation</h6></th>
                        <th><h6>Type de dossiers</h6></th>
                        <th><h6>Date de création</h6></th>
                        <th><h6>Statut</h6></th>
                        <th><h6>Actions</h6></th>
                     
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th><h6>Designation</h6></th>
                        <th><h6>Type de dossiers</h6></th>
                        <th><h6>Date de création</h6></th>
                        <th><h6>Statut</h6></th>
                        <th><h6>Actions</h6></th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>2011/01/25</td>
                        <td>61</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers"  class="text-primary">Détails</a></td>
                       
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>2011/01/25</td>
                        <td>63</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers"  class="text-primary">Détails</a></td>
                        
                    </tr>
                    
                    <tr>
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>
                        <td>2011/01/25</td>
                        <td>66</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers"  class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>
                        <td>2011/01/25</td>
                        <td>64</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers"  class="text-primary">Détails</a></td>
                        
                    </tr>
                   
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                        <td>2011/01/25</td>
                        <td>37</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers"  class="text-primary">Détails</a></td>
                        
                    </tr>
                  
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>2011/01/25</td>
                        <td>51</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers"  class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>2011/01/25</td>
                        <td>29</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers"  class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>2011/01/25</td>
                        <td>27</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#modalDetails-dossiers"  class="text-primary">Détails</a></td>
                        
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDetails-dossiers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetails-dossiersLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalDetails-dossiersLabel text-center">Infos du demandeur</h5>
            <!---gestion de la progression du tratement du dossier--->
            
            <button type="button"  class="btn-close btn-danger bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>   
        
        <div class="modal-header">
            
        <div class="container">
  <div class="row">
    <div class="col-sm-5 col-md-6 "><h5><ins>Nom & Prénom</ins> :</h5></div>
    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0"><h6>sawadogo cheick imran </h6></div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-md-5 col-lg-6 "><h5><ins>Services</ins> :</h5></div>
    <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0"><h6>BVA CENTRALE OUAGADOUGOU</h6> </div>
  </div>
</div>
            
        </div>          
                        
                        
    <!---gestion de la progression du tratement du dossier--->
       

      <div class="modal-body">
      <h6 class="modal-title" id="modalDetails-dossiersLabel text-center">Details du dossier</h6>
      <hr>
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
    
    text-align: center;
   
}

</style>
       
        @include('layouts.footers.auth.footer')
    </div>
@endsection


<!----modal sections--->

<!-- Button trigger modal -->

