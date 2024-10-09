<div id="ModalContactanos" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                CONTÁCTANOS
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="contacto_form">
                <div class="modal-body">
                    <input type="hidden" id="usu_id" name="usu_id">

                    <div class="form-group">
                        <label class="form-label" for="NOMBRE">NOMBRE :</label>
                        <input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="Introduce tu nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="TELEFONO">TELEFONO :</label>
                        <input type="text" class="form-control" id="TELEFONO" name="TELEFONO" placeholder="Introduce tu número de celular" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="CORREO">CORREO :</label>
                        <input type="email" class="form-control" id="CORREO" name="CORREO" placeholder="Introduce tu correo eléctronico" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="ASUNTO">ASUNTO : </label>
                        <select class="select2" id="ASUNTO" name="ASUNTO" data-placeholder="Seleccionar" required>
                            <option value='Quiero ser VIP'>Quiero ser VIP</option>
                            <option value='Soporte técnico'>Soporte técnico</option>
                        </select>
                    </div> 

                    <div class="form-group">
                        <label class="form-label" for="COMENTARIOS">COMENTARIOS : </label>
                        <textarea class="form-control" id="COMENTARIOS" rows="5" name="COMENTARIOS" placeholder="Introduce tus comentarios" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="enviar" value="add" class="btn btn-rounded btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>