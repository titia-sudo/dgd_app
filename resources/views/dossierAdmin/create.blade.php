
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card shadow-xl " style="background-color:#3498DB;"  >
                    <div class="card-body p-3">
                        <div class="row text-white ">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS</p>
                                    <h2 class="font-weight-bolder text-white">
                                        286
                                    </h2>
                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card bg-success shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS VALIDES</p>
                                    <h2 class="font-weight-bolder text-white">
                                        260
                                    </h2>
                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card bg-danger shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS REJETES</p>
                                    <h2 class="font-weight-bolder text-white">
                                        15
                                    </h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card bg-warning shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS EN COURS</p>
                                    <h2 class="font-weight-bolder text-white">
                                        11
                                    </h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- la partie   alerte-->
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
        <!-- fin de la partie   alerte-->

    <!-- partie   contenu de l'administation-->
    <div class="container-fluid ">
        
        <!-- DataTales Example -->
        <div class="row shadow-lg mt-5">
            <div class="col text-center">
                 <h4 class="m-0 font-weight-bold text-black">Nouveau dossier</h4>
            </div>
            <hr>
        </div>
        <div class="row shadow-lg mt-5">
        <form action="{{ route('dossiers.store') }}" method="POST">
            @csrf
            
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
                    <button class="btn btn-secondary me-md-2" type="button">Enregistrer</button>
                    <button type="submit" class="btn btn-primary">Enregister</button>
                </div>
            </div>
        </div>
        </form>
        </div>
    </div>

</div>
       
        @include('layouts.footers.auth.footer')
    </div>
@endsection