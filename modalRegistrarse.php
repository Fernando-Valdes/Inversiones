<div id="ModalRegistro" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                REGISTRARSE
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="registro_form">
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
                        <label class="form-label" for="PASSWORD">CONTRASEÑA :</label>
                        <input type="password" class="form-control" id="PASSWORD" name="PASSWORD" placeholder="Introduce tu contraseña" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="PASSWORD_2">REPETIR CONTRASEÑA :</label>
                        <input type="password" class="form-control" id="PASSWORD_2" name="PASSWORD_2" placeholder="Repite tu contraseña" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="BtnRegistro" value="add" class="btn btn-rounded btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</div>