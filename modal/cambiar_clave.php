<div id="recuperarModal" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-contenido">
                <form name="recoverClave" id="recoverClave">
                    <!-- cerrar modal -->
                    <a id="btn-c" class="btn-cerrar-popup boton-cerrar-modal" data-dismiss="modal" href="#">
                        <i class="kc-cross"></i>
                    </a>
                    <!--  cerrar modal -->
                    
                    <div class="modal-body">    
                        <h2 class="text-center titulo-modal">
                            CAMBIAR CONTRASEÑA
                        </h2>

                        <!-- mensaje error -->
                        <div class="bs-infos">
                            <div class="description">
                                <div>
                                    <span style="font-weight:bold;">
                                          RECUERDA,
                                    </span>
                                    debes colocar la dirección de correo con la que se generó tu cuenta de acceso al sistema.
                                </div>
                            </div>
                        </div>
                        <!-- fin mensaje error -->
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">
                                                Ingrese su Correo Electrónico:
                                            </label>
                                            <!-- cajas con iconos  -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <span class="ri-mail-open-line color-primary"></span>
                                                </div>
                                                <input class="form-control cajastxt" name="txtMail" id="txtMail" type="text"  autocomplete="off" placeholder="&quot;example@mail.com&quot;" maxlength="50" aria-required="true">
                                            </div> 
                                            <!-- fin cajas con iconos  -->                
                                        </div>
                                </div>
                                <!-- -->
                            </div>
                            <!-- -->
                            
                            <div class="row">
                                <!-- -->
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-sm-arrow bg-primaryd visited button" name="register" id="register" type="submit" style="box-shadow: 0px 6px 18px -5px rgb(30, 102, 46,1);">
                                            <p class="btn-text" id="texto">
                                                PROCESAR CAMBIO
                                            </p>
                                            <!-- -->
                                            <div class="ico">
                                                <i class="ri-arrow-drop-right-line" id="icon1"></i>
                                                <i class="fa fa-spinner fa-spin" id="icon2" style="display: none;"></i>
                                            </div>
                                    </button>
                                </div>
                                <!-- -->
                            </div>
                            <!-- -->
                    </div>
                </form>
            </div>
        </div>
</div>  
