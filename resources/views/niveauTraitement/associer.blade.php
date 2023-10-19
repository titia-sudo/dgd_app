@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
@include('layouts.topnavbande') 
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

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Parametre/</span> Associer Type de dossier</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            
                            <small class="text-muted float-end">Associer Type de dossier</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('niveauTraitements.associerType') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <h6>Type de dossier:</h6>
                                    </label>
                                    <select name="idTypeDossier" id="idTypeDossier" class="form-control">
                                        <option value="" selected>Veuillez choisir...</option>
                                        @foreach($TypeDoss as $TypeDoss)
                                        <option value="{{ $TypeDoss->id }}">{{ $TypeDoss->designationTypeDossier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">
                                        <input type="hidden" name="idNiveauTraitement" id="idNiveauTraitement" value="{{$niveauTraitement->id }}">
                                    </label>
                                </div>
                                <div class="text-end">
                                    <a class="btn btn-primary" href="{{ route('niveauTraitements.index') }}"> Retour</a>
                                    <button type="submit" class="btn btn-primary">Enregister</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- / Content -->
    </div>



    @include('layouts.footers.auth.footer')

</div>


@endsection