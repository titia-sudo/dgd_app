@extends('niveauTraitement.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DGD APP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('niveauTraitements.create') }}"> Nouveau</a>
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
            <th>Nom Niveau</th>
            <th>Temps de traitement</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($niveauTraitements as $niveauTraitement)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $niveauTraitement->nomNiveau }}</td>
            <td>{{ $niveauTraitement->tempsTraitement->nombreTempsTraitement}}{{ $niveauTraitement->uniteTempsTraitement->designationUniteTempsTraitement}}</td>
            <td>
                <form action="{{ route('niveauTraitements.destroy',$niveauTraitement->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('niveauTraitements.show',$niveauTraitement->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('niveauTraitements.edit',$niveauTraitement->id) }}">Edit</a>
   
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