<!-- cambiar clave Modal HTML -->
<div id="editClaveModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form name="editClave" id="editClave">
                    <div class="modal-header" style="background: #1C444D;color: white;">                      
                        <h4 class="modal-title">Cambiar Clave</h4>
                    </div>
                    <div class="modal-body">            
                        <div class="form-group">
                            <label>Clave Nueva:</label>
                            <input type="text" name="user_password_new" id="user_password_new" maxlength="12" placeholder="******" pattern=".{6,}" class="form-control" autocomplete="off" required>
                            <input type="hidden" name="txtidusers" id="txtidusers" class="form-control" value="<?php echo $user_id; ?>">
                        </div>
                        <!-- -->
                    </div>
                    <div class="modal-footer">
                        <input type="button"  class="btn btn-default" data-dismiss="modal" value="Cerrar">
                        <input type="submit" id="btnClave" class="btn btn-success" value="Cambiar Clave">
                    </div>
                </form>
            </div>
        </div>
</div>  