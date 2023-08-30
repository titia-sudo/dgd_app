@extends('tempsTraitement.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DGD APP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tempsTraitements.create') }}"> Nouveau</a>
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
            <th>Nombre</th>
            <th>Unité de temps</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tempsTraitement as $tempsTraitement)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tempsTraitement->nombreTempsTraitement }}</td>
            <td>{{ $tempsTraitement->UniteTempsTraitement->designationUniteTempsTraitement}}</td>
            <td>
                <form action="{{ route('tempsTraitements.destroy',$tempsTraitement->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('tempsTraitements.show',$tempsTraitement->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('tempsTraitements.edit',$tempsTraitement->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection

</body> 
</html>