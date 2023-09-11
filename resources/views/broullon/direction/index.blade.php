@extends('direction.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DGD APP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('directions.create') }}">Nouveau</a>
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
            <th>Nom</th>
            <th>Sigle</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($directions as $direction)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $direction->nomDirection }}</td>
            <td>{{ $direction->sigleDirection }}</td>
            <td>
                <form action="{{ route('directions.destroy',$direction->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('directions.show',$direction->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('directions.edit',$direction->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $directions->links() !!}
      
@endsection

</body> 
</html>