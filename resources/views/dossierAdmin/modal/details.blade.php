
<!-- Modal -->
<form action="{{ route('dossiers.update',$dossier->id) }}" method="POST">
<div class="modal fade" id="modalDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetails" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetails text-center">Details du dossier</h5>
            <!---gestion de la progression du tratement du dossier--->
            <label for="customRange3" class="form-label">progression</label>
              <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3" value="">
                        <div class="spinner-grow text-warning" role="status">
                         <span class="visually-hidden">Loading...</span>
                        </div>
                           
                        <button type="button"  class="btn-close btn-danger bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div class="row shadow mt-2">
        
        <div class="row">
            <div class="col">
            <label for="example-text-input" class="form-control-label text-lg">Désignation</label>
                    {!! Form::text('name', $dossier->nomDossier, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Type de dossiers</label>
                    <select class="form-select" aria-label="multiple select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>     
            </div>   
        </div>
        <div class="row"> 
            
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Déclarant </label>
                {!! Form::text('name', $dossier->declarantDossier, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
            <div class="col">
                 <label for="example-text-input" class="form-control-label text-lg">N° IFU</label>
                 {!! Form::text('name',    $dossier->ifuDossier, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
            
        </div>
     
        <div class="row">
            <div class="col">
                <label for="example-text-input" class="form-control-label text-lg">Agrément</label>
                {!! Form::text('name', $dossier->statutDossier, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
            <div class="col">
             <label for="example-text-input" class="form-control-label text-lg">Destinataire</label>
             {!! Form::text('name', $dossier->nomDossier, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
            
        </div>

        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Elements de requêtte</label>
                {!! Form::text('name', $dossier->nomDossier, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Textes de référence</label>
                {!! Form::text('name', $dossier->nomDossier, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="row">
            <div class="">
                <label for="exampleFormControlTextarea1" class="form-label text-lg">Appréciations</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value=""></textarea>
            </div>
        </div>

        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-secondary me-md-2" type="button">Enregistrer</button>
            <button class="btn btn-primary" type="button">Soumettre</button>
      </div>
    </div>
  </div>
</div>

<!-----end modal section--->