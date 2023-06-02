<!-- cambiar clave Modal HTML -->
<div id="addProyect" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form name="addProyecto" id="addProyecto">
                    <div class="modal-header" style="background: #1C444D;color: white;">                      
                        <h4 class="modal-title">
                            <i class="mdi mdi-folder-multiple-plus"></i>
                            Agregar Nuevo Proyecto
                        </h4>
                    </div>
                    <div class="modal-body">            
                        <div class="form-group">
                            <label>*Nombre del Proyecto:</label>
                            <input type="text" name="txtname" id="txtname" maxlength="30" placeholder="Escribir nombre del proyecto" class="form-control" autocomplete="off" required>
                            <input type="hidden" name="proceso" id="proceso">
                        </div>
                        <!-- comentarios -->
                        <div class="form-group">
                            <label>Descripción del Proyecto:</label>
                            <textarea  id="txtdescrip" name="txtdescrip" class='form-control summernote' ></textarea>
                        </div>
                        <!-- -->
                        <div class="form-group">
                            <label>Visibilidad del Proyecto:</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="border stilo-marcadores rounded mb-3 mb-md-0">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="shippingMethodRadio1" name="shippingOptions" class="custom-control-input" checked="">
                                                <label class="custom-control-label font-16 font-weight-bold" for="shippingMethodRadio1">Público</label>
                                            </div>                        
                                        </div>
                                    </div>
                                    <!-- -->
                                    <div class="col-md-4">
                                        <div class="border stilo-marcadores rounded">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="shippingMethodRadio2" name="shippingOptions" class="custom-control-input">
                                                <label class="custom-control-label font-16 font-weight-bold" for="shippingMethodRadio2">Privado</label>
                                            </div>                                
                                        </div>
                                    </div>
                                    <!-- -->
                                    <div class="col-md-4">
                                        <div class="border stilo-marcadores rounded">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="shippingMethodRadio3" name="shippingOptions" class="custom-control-input">
                                                <label class="custom-control-label font-16 font-weight-bold" for="shippingMethodRadio3">Con clave</label>
                                            </div>                                
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button"  class="btn btn-default" data-dismiss="modal" value="Cerrar">
                        <input type="submit" id="btnAdd" class="btn btn-success" value="CREAR PROYECTO">
                    </div>
                </form>
            </div>
        </div>
</div>  