
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
            </div>

            <div class="container mt-6 shadow-lg  col-9  p-5 bg-body rounded ">
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
                    </div>
                    <div class="row">
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
                    <form action="{{ route('dossiers.traiterDossier', ['dossier' => $dossier->id]) }}" method="POST">
                    @csrf
                        <!-- Champ de Commentaire (affiché uniquement lors de la validation) -->
                        <div class="row">
                            <div id="commentaireAction" class="form-label text-lg">
                                <label for="commentaireAction">Commentaire :</label>
                                <textarea name="commentaireAction" class="form-control" required></textarea>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{ route('validateurs.index') }}">Retour</a>
                        <button type="submit" class="btn btn-primary" name="rejeter">Rejeter</button>
                        <button type="submit" class="btn btn-primary" name="valider">Valider</button>
                    </form>
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
        <!-- Script pour afficher le champ de commentaire lors de la validation -->
<!-- <script>
    document.getElementById('btn-valider').addEventListener('click', function() {
        document.getElementById('commentaireAction').style.display = 'block';
    });

    // Optionnel : Masquer le champ de commentaire lors du rejet (s'il est affiché)
    document.getElementById('btn-rejeter').addEventListener('click', function() {
        document.getElementById('commentaireAction').style.display = 'none';
    });
</script> -->
    </div>
@endsection






