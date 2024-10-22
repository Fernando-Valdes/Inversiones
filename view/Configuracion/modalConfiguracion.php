<div id="modalnuevo" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="usu_id" name="usu_id">

                    <div class="form-group">
                        <label class="form-label" for="usu_nom">Enlace Ewinscore</label>
                        <input type="text" class="form-control" id="Ewinscore" name="Ewinscore" placeholder="Ingrese su Enlace Ewinscore" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_ape">Enlace Grupo de WhatsApp</label>
                        <input type="text" class="form-control" id="WhatsApp" name="WhatsApp" placeholder="Ingrese su Enlace Grupo de WhatsApp" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>