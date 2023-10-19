<!-- Navbar -->

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3 ">
        <div class="  col-sm-4 col-md-4 col-lg-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{Route::current()->uri()}}</li>
                </ol>
            </nav>
        </div>

        <div class=" col-sm-6 col-md-4 col-lg-4 ">
            <h3 class="font-weight-bolder text-white mb-0">Accueil</h3>
        </div>

        <div class="col-sm-4 col-md-4 col-lg-4 ">
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="text-white">
                        <p><i class=" fw-bold "> Bienvenue</i></p>
                        <p> {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="btn dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/../img/profile2.jpeg" class="rounded-circle fa fa-user-circle  " style="height: 65px; max-width: 65px;">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li class="dropdown-item d-flex align-items-center">
                            <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link  font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Deconnexion</span>
                                </a>
                            </form>
                        </li>
                        <li><a class="dropdown-item" href="#">Modifier le profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-dark ">
    <div class="container px-10">

        <div class=" text-justify mt-4 ">
            <h6 class="text-white"> Dossiers valides :</h6>
        </div>
        <div class="">
            <div class="p-4 text-white text-left rounded-circle bg-success" style="height: 75px; max-width: 75px;">
                <h5 class="text-white">24</h5>
            </div>
        </div>
        <div class="text-justify mt-4">
            <h6 class="text-white"> Dossiers rejetes :</h6>
        </div>
        <div class="">
            <div class="p-4 text-white text-center rounded-circle bg-danger" style="height: 75px; max-width: 75px;">
                <h5 class="text-white ">55</h5>
            </div>
        </div>

        <div class=" text-justify mt-4">
            <h6 class="text-white"> Dossiers en cours :</h6>
        </div>
        <div class="p-4  font-weight-bold text-center rounded-circle bg-warning" style="height: 75px; max-width: 75px;">
            <h5 class="text-white">25</h5>
        </div>

    </div>

    <div class="row">

    </div>
</nav>
