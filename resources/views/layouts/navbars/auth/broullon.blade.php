<nav class="navbar navbar-expend-sm bg-light navbar-light">
    <div class="contener-fluid">
        <a class="navbar-brand" href="">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data_bs_target="#menudetractable">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menudetractable">
            <ul class="nav nav-nav  ">
                <li class="nav-item">
                    <a href="#" class="nav-link">Presentation</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Equipe</a>
                </li>
                <li class="nav-item disabled">
                    <a href="#" class="nav-link">contact</a>
                </li>
                <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown">produits</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown--item" href="">ordinateur</a></li>
                        <li><a class="dropdown--item" href="">tablette</a></li>
                        <li><a class="dropdown--item" href="">Smarphone</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>





<li class="nav-item">
                <a data-toggle="collapse" aria-expanded="false" href="#gestionUser" class=" nav-link {{ Route::currentRouteName() == 'creation de compte' || Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                
                     <p>
                        <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Gestion des utilisateurs </h6>
                        <b class="caret"></b>
                    </p>
                </a>
                 <div class="collapse " id="gestionUser">
                    <ul class="nav">
                        <li class="nav-link {{ Route::currentRouteName() == 'creation de compte' ? 'active' : '' }}">
                            <a href="{{ route('profile') }}">
                                <span class="nav-link-text ms-1" >{{ _('creation de compte') }}</span>
                            </a>
                        </li>

                         <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                            <a href="{{ route('profile') }}">
                                <span class="nav-link-text ms-1" >{{ _('Liste des utilisateurs') }}</span>
                            </a>
                        </li>

                    </ul>

                 </div>
                
            </li>





            <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <img src="./img/logo-dgd.png" class="navbar-brand-img " alt="main_logo">
        </a>
    </div>


    -sm-3 col-md-3 col-lg-3

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div>

</ul>
<!-- End of Sidebar -->





   <!---- <div class="collapse navbar-collapse " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tableau de bord</span>
                </a>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" aria-expanded="false" href="#gestionUser" class=" nav-link {{ Route::currentRouteName() == 'creation de compte' || Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                
                     <p>
                        <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Gestion des utilisateurs </h6>
                        <b class="caret"></b>
                    </p>
                </a>
                 <div class="collapse " id="gestionUser">
                    <ul class="nav">
                        <li class="nav-link {{ Route::currentRouteName() == 'creation de compte' ? 'active' : '' }}">
                            <a href="{{ route('profile') }}">
                                <span class="nav-link-text ms-1" >{{ _('creation de compte') }}</span>
                            </a>
                        </li>

                         <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                            <a href="{{ route('profile') }}">
                                <span class="nav-link-text ms-1" >{{ _('Liste des utilisateurs') }}</span>
                            </a>
                        </li>

                    </ul>

                 </div>
                
            </li>


        

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="#gestionUser">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>

                <div class="collapse " id="gestionUser">
                    <ul class="nav">
                        <li class="nav-link {{ Route::currentRouteName() == 'creation de compte' ? 'active' : '' }}">
                            <a href="{{ route('profile') }}">
                                <span class="nav-link-text ms-1" >{{ _('creation de compte') }}</span>
                            </a>
                        </li>

                         <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                            <a href="{{ route('profile') }}">
                                <span class="nav-link-text ms-1" >{{ _('Liste des utilisateurs') }}</span>
                            </a>
                        </li>

                    </ul>

                 </div>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'user-management']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'tables']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  str_contains(request()->url(), 'billing') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'billing']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'virtual-reality' ? 'active' : '' }}" href="{{ route('virtual-reality') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'rtl' ? 'active' : '' }}" href="{{ route('rtl') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active' : '' }}" href="{{ route('profile-static') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('sign-in-static') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('sign-up-static') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div> 
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="/img/illustrations/icon-documentation-warning.svg"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="/docs/bootstrap/overview/argon-dashboard/index.html" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank" type="button">Upgrade to PRO</a>
    </div>
    --->








    <aside class="sidenav bg-white  navbar navbar-vertical navbar-expand-xs border-1 shadow-xl  border-radius-xl my-4 fixed-start ms-4 "
    id="sidenav-main">

   
    <!----partie du code concernant le logo--->
        <div class="class row">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        
            <img src="./img/logo-dgd.png" width="450" height="300" alt="main_logo">
        </div>
        <hr class="horizontal " style="height:3px;border-width:1;color:#04AA6D;background-color:#04AA6D">
        
 
 
        
     
    
     <!---partie du code concernant le menu ----->
      <div class="sidebar-wrapper" >
        <div class="class row">
            <ul class="navbar-nav">

            
                <li class="nav-item">
                    <a  class=" nav-link {{ Route::currentRouteName() == 'creation de compte' || Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}" href="{{ route('home') }}">
                            <div class="fa fa-bank border-radius-md text-center me-2 d-flex "></div>
                            <span class="nav-link-text ms-1">Tableau de bord</span>
                    </a>
                </li>


                    <li class="nav-item ">
                            <a data-bs-toggle="collapse" data-bs-target="#collapse-user" aria-expanded="true" class="nav-link {{ Route::currentRouteName() == 'creation de compte' || Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                                    <div class="fa fa-user  border-radius-md align-items-center justify-content-center text-center me-2 d-flex ">
                                    
                                    </div>
                                    <span class="nav-link-text ms-1">Gestion des utilisateurs</span>
                            </a>

                                <div class="collapse " id="collapse-user" >
                                    <ul class="nav " >
                                        <li class="nav-link {{ Route::currentRouteName() == 'creation de compte' ? 'active' : '' }}">
                                            <a href="{{ route('profile') }}">
                                            <i class="fas fa-user-plus ms-4">__</i>
                                                <span class="  nav-link-text  " >  creation de compte</span>
                                            </a>
                                        </li>
                                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                                            <a href="{{ route('profile') }}">
                                            <i class="fas fa-users   ms-4">__</i>
                                                <span class="nav-link-text" >Liste des utilisateurs</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                    </li>



                    <li class="nav-item ">
                            <a data-bs-toggle="collapse" data-bs-target="#collapse-dossier" aria-expanded="true" class="nav-link {{ Route::currentRouteName() == 'creation de compte' || Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                                    <div class="fa fa-folder border-radius-md align-items-center justify-content-center text-center me-2 d-flex ">
                                    
                                    </div>
                                    <span class="nav-link-text">Gestion des dossiers</span>
                            </a>

                                <div class="collapse  " id="collapse-dossier" >
                                    <ul class="nav " >
                                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                                            <a href="{{ route('profile') }}">
                                            <i class="fa fa-folder-open-o ms-4">__</i>
                                                <span class="nav-link-text" >Liste des dossiers</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                    </li>


                    <li class="nav-item ">
                            <a data-bs-toggle="collapse" data-bs-target="#collapse-parametre" aria-expanded="true" class="nav-link {{ Route::currentRouteName() == 'creation de compte' || Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                                    <div class="fa fa-gear border-radius-md align-items-center justify-content-center text-center me-2 d-flex ">
                                    </div>
                                    <span class="nav-link-text ">Parametrage</span>
                            </a>

                                <div class="collapse  " id="collapse-parametre" >
                                    <ul class="nav " >
                                        <li class="nav-link {{ Route::currentRouteName() == 'creation de compte' ? 'active' : '' }}">
                                            <a href="{{ route('profile') }}">
                                            <i class="fa fa-gears ms-4">__</i>
                                                <span class="nav-link-text " >Temps de traitement</span>
                                            </a>
                                        </li>
                                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                                            <a href="{{ route('profile') }}">
                                            <i class="fa fa-gears ms-4">__</i>
                                                <span class=" nav-link-text " >Créer type de dossiers</span>
                                            </a>
                                        </li>

                                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                                            <a href="{{ route('profile') }}">
                                            <i class="fa fa-gears ms-4">__</i>
                                                <span class="nav-link-text " >Créer niveau de traitement</span>
                                            </a>
                                        </li>

                                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                                            <a href="{{ route('profile') }}">
                                            <i class="fa fa-code-fork ms-4">__</i>
                                                <span class="nav-link-text " >configuration de flux</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                    </li>



                </ul>
        </div>
       
     </div>
     
</aside>



nav{
            width:90%;
            height:710px;
            margin:25px auto;
            background:white;
            border-radius:5px;
            overflow:hidden;
        }

        aside{
            width:20%;
            height:100px;
            margin:25px auto;
            background:#000d33;
            float:left;
        }

        aside h1 img{
            width:51px;
            float:left;
        }

        aside h1 span{
            font-size:30px;
            line-height:50px;
            margin-left:6px;
            color:white;

        }

        aside ul{
            padding: 5px 0 5px 30px;
        }

        aside ul li{
            list-style:none;
            font-weight:bold;
            margin:20px auto;
            position:relative;
            overflow:hidden;
            max-height:35px;
            line-height:35px;
            transition:1s;
            text-transform:capitalize;
        }

        aside ul:first-child{
            max-height:50px;
        }
        aside ul:first-child li:hover{
            background:none;
        }

        aside ul li:hover{
            background:#d1d1d173;
        }
        aside ul li a{
            text-decoration:none;
            color:whitesmoke;
        }

        aside ul li a i{
            width:30px;
            padding:5px;
            margin-right:10px;
        }

        aside ul li a i.fa-angle-right{
            position:absolute;
            right:0;
            top:5px;
            transition:0.5s;
        }
        </style>

        


        @extends('layouts.app-user', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav-user', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
                
                <div class="card card-circle">
           
               <p class="card-text">250 </p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                 <div class="card card-circle">
                  </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                 <div class="card card-circle">
            
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                 <div class="card card-circle">

                </div>
            </div>
        </div>
        
    <!-- partie   contenu de l'administation-->
<div class="container-fluid">

  <!-- DataTales Example -->
    <div class="row text-center mt-5">
        <h4 class="m-0 font-weight-bold text-black">Liste des dossiers</h4>
    </div>

    <div class="row shadow mt-2">
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
                        <td><a href="" class="text-primary">Détails</a></td>
                       
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>2011/01/25</td>
                        <td>63</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                    
                    <tr>
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>
                        <td>2011/01/25</td>
                        <td>66</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>
                        <td>2011/01/25</td>
                        <td>64</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                   
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                        <td>2011/01/25</td>
                        <td>37</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                  
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>2011/01/25</td>
                        <td>51</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>2011/01/25</td>
                        <td>29</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>2011/01/25</td>
                        <td>27</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap');

.card-circle{
    text-align:center;
     margin-top:10px;
     background:#27496D;    
     border:1px solid transparent;
     color:#fff;
     Font-family: Montserrat;
     padding:40px;
     border-radius:50%;
}
 .card-title{
    font-weight:600;
     font-size:10px;
}
 .card-circle .card-text{
    font-weight:400;
}
 .card-circle .card-icon i{
     font-size:60px;
     display:block;
}
 .card-circle:nth-child(2){
    background:#142850;
}
 .card-circle .btn{
    Font-family: Montserrat;
    background:transparent;
     border:1px solid #fff;
     text-transform:uppercase;
     padding:5px 30px;    
     border-radius:0px;
     Font-weight:60;
}
.card-circle .btn,.card-circle .card-icon i,.card-circle{
   transition: all ease-in-out 0.2s;
}
 .card-circle:hover .btn{
    background:#00A8CC;
     color:#fff;
   border: 1px solid transparent;
}
 .card-circle .btn:hover{
    transform: scale(1.1);
}
 .card-circle:hover{
    border:10px solid #00A8CC;
}
 .card-circle:hover i {
   text-shadow: 0px -1px 10px #00A8CC;
    transform:scale(1.2)rotate(20deg);
}
 @media only screen and (min-width: 1200px) {
     .card-circle:nth-child(3){
         margin-left:-40px;
         z-index:0;
    }
     .card-circle{
         width:80px;
         height:80px;
    }
     .card-circle:nth-child(2){
         margin-left:-20px;
         box-shadow: 1px 2px 20px 8px rgba(241, 235, 235, 0.12);
         transform: scale(1.2);
         z-index:1;
    }
   .card-circle .card-icon i{
      margin-top: 2px;
     }
}
@media only screen and (min-width: 991px) and (max-width: 1200px) {
   .card-circle{
         width:340px;
         height:340px;
    }
  .card-circle .card-icon i{
     font-size:5px;
   }
  .card-circle .card-icon i{
      margin-top: -25px;
     }
   .card-circle:nth-child(3){
         margin-left:-5px;
         z-index:0;
    }
   .card-circle:nth-child(2){
         margin-left:-2px;
         z-index:1;
    }
}

</style>
       
        @include('layouts.footers.auth.footer')
    </div>
@endsection