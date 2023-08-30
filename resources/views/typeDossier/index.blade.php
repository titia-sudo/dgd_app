@extends('typeDossier.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DGD APP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('typeDossiers.create') }}">  Nouveau</a>
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
            <th>Designation</th>
            <th>Nombre Niveau de traitement:</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($typeDossiers as $typeDossier)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $typeDossier->designationTypeDossier }}</td> 
            <td>{{ $typeDossier->nombreNiveauTraitement }}</td>
            </div>
        </div>
            <td>
                <form action="{{ route('typeDossiers.destroy',$typeDossier->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('typeDossiers.show',$typeDossier->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('typeDossiers.edit',$typeDossier->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $typeDossiers->links() !!}
      
@endsection

</body> 
</html>