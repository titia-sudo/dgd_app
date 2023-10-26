@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
@include('layouts.topnavbande') 
    <!-- partie   alerte-->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- partie   alerte-->
    <!-- partie   contenu de l'administation-->

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Parametre/</span> Détails rôle</h5>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Retour</a>
                            <small class="text-muted float-end">Détails</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Rôle:</h6>
                                </label>
                                {{ $role->name }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">
                                    <h6>Permission:</h6>
                                </label>
                                @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                                @endif
                            </div>
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary">Annuler</button>
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