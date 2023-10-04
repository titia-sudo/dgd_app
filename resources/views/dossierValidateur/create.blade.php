
@extends('layouts.app-validateur', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    
    <!-- partie   contenu de l'administation-->
<div class="container">

            <!-- DataTales Example -->
       
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
        <div class="row shadow mt-7">
        <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('validateurs.index') }}"> Retour</a>
          </div>
        <div class=" text-center mb-3">
            <h4 class="m-0 font-weight-bold text-black">Nouveau dossier</h4>
         </div>
        <form action="{{ route('validateurs.store') }}" method="POST">
        @csrf
        <hr>
        <div class="row">
        <div class="col">
                    <strong>Nom du dossier:</strong>
                    <input type="text" name="nomDossier" class="form-control" placeholder="Saisissez le nom du dossier ">
                    </div>
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Type de dossiers</label>
                    <select name="idTypeDossier" id="idTypeDossier" class="form-control">
                        @foreach($typeDossiers as $typeDossier)
                            <option value="{{ $typeDossier->id }}">{{ $typeDossier->designationTypeDossier }}</option>
                        @endforeach
                    </select>       
            </div>
            
        </div>
        <div class="row"> 
            
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Déclarant </label>
                <input type="text" name="declarantDossier" class="form-control" placeholder="Saisissez le nom du declarant">
            </div>
            <div class="col">
                 <label for="example-text-input" class="form-control-label text-lg">N° IFU</label>
                 <input type="text" name="ifuDossier" class="form-control" placeholder="Saisissez le numero IFU">
            </div>
            
        </div>

        <div class="row">
            <div class="col">
                    <label for="example-text-input" class="form-control-label text-lg">Agrément</label>
                    <input type="text" name="agrementDossier" class="form-control" placeholder="Saisissez votre agrement">
            </div>
            <div class="col">
                    <label for="example-text-input" class="form-control-label text-lg">Destinataire</label>
                    <input type="text" name="destinataireDossier" class="form-control" placeholder="Saisissez les informations du destinataire">
            </div>
            
        </div>

        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Elements de requêtte</label>
                <textarea name="elementRequeteDossier" class="form-control" placeholder="Saisissez votre requete"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Textes de référence</label>
                <textarea name="texteReferenceDossier" class="form-control" placeholder="saisissez les textes de reference"></textarea>
            </div>
        </div>
       <div class="row mt-3">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-secondary me-md-2" name="action" type="submit" value="brouillon">Enregistrer</button>
                <button class="btn btn-primary" type="submit" name="action" value="soumettre">Soumettre</button>
            </div>
       </div>

       

        
        </div>
        </form>
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