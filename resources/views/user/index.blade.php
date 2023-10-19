@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
@include('layouts.topnavbande') 
    <!-- partie   alerte-->
    @if ($message = Session::get('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            {{ $message }}
        </div>
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="row text-center mt-5">
        <h4 class="m-0 font-weight-bold text-black">Liste des utilisateurs</h5>
    </div>
    <hr>
    <!-- partie   alerte-->

    <form method="GET" action="{{ route('Filtrer') }}" id="filtrageUser">
        <div class="row shadow mt-2 p-2 ">
            <div class="col-md-2">
                <div>
                    <h5>FILTRE :</h5>
                </div>
            </div>
            <div class="col-md-2 ">
                <label>
                    <h6>Date de Creation</h6>
                    <input type="date" name="dateCreation" class="form-control" value="{{ request('dateCreation') }}">
                </label>
            </div>
            <div class="col-md-2 ">
                <label>
                    <h6>Role :</h6>
                </label>
                <select name="roleId" class="form-control">
                    <option value="">Tous les rôles</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if ($roleId==$role->id) selected @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label>
                    <h6>Service :</h6>
                </label>
                <select name="serviceId" class="form-control">
                    <option value="">Tous les services</option>
                    @foreach($services as $service)
                    <option value="{{ $service->id }}" @if($serviceId==$service->id) selected @endif>{{ $service->nomService }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label>
                    <h6>Direction :</h6>
                </label>
                <select name="idDirection" class="form-control">
                    <option value="">Toutes les directions</option>
                    @foreach($directions as $direction)
                    <option value="{{ $direction->id }}" @if($idDirection==$direction->id) selected @endif>{{ $direction->nomDirection }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mt-5">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </div>

    </form>

    <!-- partie   contenu de l'administation-->
    <div class="container-fluid">

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

                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">voir plus</a>

                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">modifier</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">supprimer</button>
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