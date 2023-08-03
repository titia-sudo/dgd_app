@extends('uniteTempsTraitement.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DGD APP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('uniteTempsTraitements.create') }}">  Nouveau</a>
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
        @foreach ($uniteTempsTraitements as $uniteTempsTraitement)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $uniteTempsTraitement->designationUniteTempsTraitement }}</td>
            <td>
                <form action="{{ route('uniteTempsTraitements.destroy',$uniteTempsTraitement->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('uniteTempsTraitements.show',$uniteTempsTraitement->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('uniteTempsTraitements.edit',$uniteTempsTraitement->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $uniteTempsTraitements->links() !!}
      
@endsection

</body> 
</html>