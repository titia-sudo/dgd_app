
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
            <div class="col-10">
                 <h4 class="m-0 font-weight-bold text-black">Ajout de temps de traitement</h4><br>
            </div>
            
        </div>
        <hr>
            <form action="{{ route('tempsTraitements.store') }}" method="POST">
            @csrf
                    <div class="container shadow col-9 p-6 ">
                        <div class="row ">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="nombreTempsTraitement" class="form-control" placeholder="Temps de traitement">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                <strong>Unité de temps de traitement:</strong>
                                    <select name="idUniteTempsTraitement" id="idUniteTempsTraitement" class="form-control">
                                        <option value="" selected>Veuillez choisir</option>
                                        @foreach($uniteTempsTraitements as $uniteTempsTraitement)
                                        <option value="{{ $uniteTempsTraitement->id }}">{{ $uniteTempsTraitement->designationUniteTempsTraitement }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-end">
                                <a class="btn btn-primary" href="{{ route('tempsTraitements.index') }}"> Retour</a>
                                    <button type="submit" class="btn btn-primary">Enregister</button>
                                 </div>
                        </div>
                    </div>
                </form>
    
    </div>

</div>
       
        @include('layouts.footers.auth.footer')
    </div>
@endsection