
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
        <!-- partie   alerte-->
        @if ($message = Session::get('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                {{ $message }}
                </div>
                </div>
        @endif
        <!-- partie   alerte-->
    <!-- partie   contenu de l'administation-->
<div class="container-fluid">

  <!-- DataTales Example -->
    <div class="row text-center mt-5">
        <h4 class="m-0 font-weight-bold text-black">Liste des utilisateurs</h4>
    </div>
<hr>
    <form method="GET" action="{{ route('user.index') }}">
       <div class="row shadow mt-2">
       <div class="col-md-2">
            <div>
                <h5>FILTRE :</h5>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dataTables_length select" id="dataTable_length">
                <label> <h6>Date de Creation</h6>
                <input type="date" name="dateCreation" value="{{ $dateCreation }}" class="form-control">
                </label>
            </div>
        </div>

        <div class="col-md-2">
            <div class="dataTables_length select" id="dataTable_length">
                <label><h6>Service</h6>
                    <select name="service_id" class="form-control">
                        <option value="">Tous les services</option>
                        @foreach($services as $service)
                            <option {{$service->id==$service->idService?'selected':''}} value="{{ $service->id }}">{{ $service->nomService }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="dataTables_length select" id="dataTable_length">
                <label><h6>Directions</h6>
                    <select name="service_id" class="form-control">
                        <option value="">Toutes les directions</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->nomService }} {{ $service->Direction->nomDirection }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="dataTables_length select" id="dataTable_length">
                <label for="role"><h6>Rôle :</h6>
                    <select name="role" class="form-control">
                    <option value="">Tous les roles</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="dataTables_length select" id="dataTable_length">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </div>
    </form>
    <hr>
        <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Nouveau</a>
            </div>
        </div>

    <div class="card-body shadow">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nom d'utilisateur</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nom d'utilisateur</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th width="280px">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
    
                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
   
                                        @csrf
                                        @method('DELETE')
      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    </div>
</div>

</div>
       
        @include('layouts.footers.auth.footer')
    </div>
@endsection