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
        
    <!-- partie   contenu de l'administation-->
        <div class="row mt-6 mb-6">

                <!-- partie  de la courbe des donnees -->
                <div class="col-xl-7 col-lg-6">
                    <div class="card shadow-inner mb-4">
                       <img src="../img/imaget.png" alt="Nature" onclick="myFunction(this);">
                    </div>
                </div>

                <!-- partie  du diagramme  circulaire -->
                <div class="col-xl-5 col-lg-6">
                    <div class="card shadow mb-4">
                        <img src="../img/circulaire.png" alt="Snow" onclick="myFunction(this);">
                    </div>
                </div>
        </div>
       
        @include('layouts.footers.auth.footer')
    </div>
@endsection