<div class="modal fade" id="basicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier statut</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="sbmitF">
                    <div class="form-group">
                        <label>Statut:</label>
                        <select class="form-control" id="status">
                            <option value="0" @if($customer->status == 0) selected @endif>En attente</option>
                            <option value="1"  @if($customer->status == 1) selected @endif>Validé</option>
                            <option value="2" @if($customer->status == 2) selected @endif>Annuler</option>

                        </select>
                    </div>
                    <input type="hidden" value="{{ $customer->id }}" id="customer">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                <button type="button" id="save-status" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
