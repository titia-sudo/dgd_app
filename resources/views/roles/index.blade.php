@extends('roles.layout')
 
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
        <form action="{{ route('roles.destroy', ['id' => $role->id]) }}" method="POST">
            <a class="btn btn-info" href="{{ route('roles.show', ['id' => $role->id]) }}">Afficher</a>
            <a class="btn btn-primary" href="{{ route('roles.edit',['id' => $role->id]) }}">Modifier</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}


<p class="text-center text-primary"><small>Direction Générale des Douanes</small></p>
@endsection