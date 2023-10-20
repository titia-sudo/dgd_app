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
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="row text-center mt-5">
            <h4 class="m-0 font-weight-bold text-black">Liste des directions de la Douane</h4>
        </div>
        <hr>
        <div class="row shadow mt-2">
            <div class="col-sm-3 col-md-3">
                <div>
                    <h5>FILTRE :</h5>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 ">
                <div class="dataTables_length select" id="dataTable_length">
                    <label>
                        <h6>Date</h6>
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
                    <label>
                        <h6>Statut</h6>
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
                    <label>
                        <h6>Type</h6>
                        <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('directions.create') }}"> Nouveau</a>
            </div>
        </div>

        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nom</th>
                            <th>Sigle</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nom</th>
                            <th>Sigle</th>
                            <th width="280px">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($directions as $direction)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $direction->nomDirection }}</td>
                            <td>{{ $direction->sigleDirection }}</td>
                            <td>
                                <form action="{{ route('directions.destroy',$direction->id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('directions.show',$direction->id) }}">voir plus</a>

                                    <a class="btn btn-primary" href="{{ route('directions.edit',$direction->id) }}">modifier</a>

                                    @csrf
                                    @method('DELETE')

                                    @if(auth()->user()->hasRole('super-administrateur'))
                                    <button type="submit" class="btn btn-danger">supprimer</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $directions->links() !!}
            </div>
        </div>
    </div>

</div>

@include('layouts.footers.auth.footer')
</div>
@endsection
