@extends('layouts.app-user', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    
    <!-- partie   contenu de l'administation-->
<div class="container">

            <!-- DataTales Example -->
       

        <div class="row shadow mt-2">
        <div class=" text-center mt-7 mb-3">
            <h4 class="m-0 font-weight-bold text-black">Nouveau dossier</h4>
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
       <div class="row mt-3">
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-secondary me-md-2" type="button">Enregistrer</button>
            <button class="btn btn-primary" type="button">Soumettre</button>
         </div>
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