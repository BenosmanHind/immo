<div class="modal" tabindex="-1" role="dialog" id="modal-message">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Envoyer un message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="form_group">
                        <textarea class="form_control" placeholder="Message" id="message" required></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{ $announcement }}"id="announcement">
            <input type="hidden" value="{{ $recipient }}"id="recipient">
            <input type="hidden" value="{{ $sender }}"id="sender">
        </div>
        <div class="modal-footer">
          <button type="button" id="store-message" style="background-color: #e8c819; border-color:#e8c819;" class="btn btn-primary">Envoyer</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
