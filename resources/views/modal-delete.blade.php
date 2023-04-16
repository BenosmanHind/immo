<div class="modal" tabindex="-1" role="dialog" id="modal-delete">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Supprimer l'annonce</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <p>Vous êtes en train de supprimer votre annonce, merci d'en préciser la raison :</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="radios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Avez-vous vendu votre article sur Immo+ ?
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="radios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Avez-vous vendu votre article ailleurs ?
                </label>
              </div>
              <div class="form-check disabled">
                <input class="form-check-input" type="radio" name="exampleRadios" id="radios3" value="option3" >
                <label class="form-check-label" for="exampleRadios3">
                    Avez-vous désisté de vendre l'article ?
                </label>
              </div>
              <input type="hidden" value="{{ $announcement->id }}"id="announcement">
        </div>
        <div class="modal-footer">
          <button type="button" id="store-information" style="background-color: #e8c819; border-color:#e8c819;" class="btn btn-primary">Enregistrer</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
