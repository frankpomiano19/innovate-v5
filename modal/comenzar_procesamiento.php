<!-- cambiar clave Modal HTML -->
<div id="comenzarProceso" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form name="addProyecto" id="addProyecto">
                <div class="modal-header" style="background: #1C444D;color: white;">
                    <h4 class="modal-title">
                        <i class="mdi mdi-folder-multiple-plus"></i>
                        Comenzar procesamiento
                    </h4>
                </div>
                <div class="modal-body">
                    Haga clic en "Comenzar procesamiento" para iniciar el procesamiento de las imágenes. Esto puede tardar un tiempo. ¿Desea continuar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-backdrop="false" id="token-project" data-dismiss="modal">Comenzar procesamiento</button>
                </div>
            </form>
        </div>
    </div>
</div>