@extends('user.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DGD APP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('services.create') }}">  Nouveau</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($services as $service)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $service->nomService }}</td>
            <td>{{ $service->idDirection }}</td>
            <td>
                <form action="{{ route('services.destroy',$service->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $services->links() !!}
      
@endsection

</body> 
</html>