@extends('dossier.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DGD APP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dossiers.create') }}">  Nouveau</a>
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
            <th>nom Dossier</th>
            <th>Declarant</th>
            <th>IFU</th>
            <th>Agrement</th>
            <th>Destinataire</th>
            <th>element de Requete</th>
            <th>texte de Reference</th>
            <th>Utilisateur</th>
            <th>Type de dossier</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($dossiers as $dossier)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $dossier->nomDossier }}</td>
            <td>{{ $dossier->declarantDossier }}</td>
            <td>{{ $dossier->ifuDossier }}</td>
            <td>{{ $dossier->agrementDossier }}</td>
            <td>{{ $dossier->destinataireDossier }}</td>
            <td>{{ $dossier->elementRequeteDossier }}</td>
            <td>{{ $dossier->texteReferenceDossier }}</td>
            <td>{{ $dossier->statutDossier }}</td>
            <td>
                <form action="{{ route('dossiers.destroy',$dossier->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('dossiers.show',$dossier->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('dossiers.edit',$dossier->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $dossiers->links() !!}
      
@endsection

</body> 
</html>