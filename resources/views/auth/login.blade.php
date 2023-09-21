
@extends('layouts.app')

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-6">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Bienvenue </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="flex flex-col mb-3">
                                <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email')}}" aria-label="Email">
                                @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <input type="password" name="password" class="form-control form-control-lg" aria-label="Password" >
                                @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">connexion</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-1 text-sm mx-auto">
                            Mot de passe oublié?
                            <a href="" class="text-primary text-gradient font-weight-bold">Cliquez ici</a>
                        </p>
                        
                    </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../img/dgd-maison2.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection