<div id="registerModal" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-contenido">
                <form name="fregistro" id="fregistro" method="post" novalidate="novalidate">
                    <!-- cerrar modal -->
                    <a id="btn-c" class="btn-cerrar-popup boton-cerrar-modal" data-dismiss="modal" href="#">
                        <i class="kc-cross"></i>
                    </a>
                    <!--  cerrar modal -->
                    <div class="modal-body">    
                        <h2 class="text-center titulo-modal">
                            CREA TU CUENTA DE ACCESO
                        </h2>
                        <!-- mensaje error -->
                        <div id="notificaciones">
                            
                        </div>
                        
                        <!-- fin mensaje error -->

                        <!-- -->
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">
                                                Ingrese su Nombre:
                                            </label>
                                            <!-- cajas con iconos  -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <span class="ri-user-3-line color-primary"></span>
                                                </div>
                                                <input class="form-control cajastxt" name="txtNom" id="txtNom" type="text"  autocomplete="off" placeholder="&quot;John doe&quot;" onkeypress="ValidaSoloLetras();" maxlength="30" aria-required="true">
                                            </div> 
                                            <!-- fin cajas con iconos  -->                
                                        </div>
                                </div>
                                <!-- -->
                            </div>
                            <!-- -->
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">
                                                Ingrese sus Apellidos:
                                            </label>
                                            <!-- cajas con iconos  -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <span class="ri-user-3-line color-primary"></span>
                                                </div>
                                                <input class="form-control cajastxt" name="txtApe" id="txtApe" type="text"  autocomplete="off" placeholder="&quot;Doe Patrick&quot;" onkeypress="ValidaSoloLetras();" maxlength="40" aria-required="true">
                                            </div> 
                                            <!-- fin cajas con iconos  -->                
                                        </div>
                                </div>
                                <!-- -->
                            </div>
                            <!-- -->
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
                                                <input class="form-control cajastxt" name="txtMail" id="txtMail" type="text"  autocomplete="off" placeholder=" &quot;example@mail.com&quot;" maxlength="50" aria-required="true">
                                            </div> 
                                            <!-- fin cajas con iconos  -->                
                                        </div>
                                </div>
                                <!-- -->
                            </div>
                            <!-- -->
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">
                                                Ingrese su Clave:
                                            </label>
                                            <!-- cajas con iconos  -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <span class="ri-lock-password-line color-primary"></span>
                                                </div>
                                                <input class="form-control cajastxt" name="txtClave" id="txtClave" type="password"  autocomplete="off" maxlength="15" placeholder="&quot;John$99*04&quot;" aria-required="true">
                                                <!-- -->
                                                <input type="hidden" name="proceso" id="proceso" autocomplete="off">
                                            </div>
                                            <!-- --> 
                                            <div class="feedback-text">
                                                La clave debe tener al menos 
                                                <span style="color: red;">
                                                    8 caracteres</span> 
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
                                   <button class="btn btn-sm-arrow bg-primaryd visited button" name="register" id="register" type="submit">
                                            <p class="btn-text" id="texto">
                                                REGISTRARSE
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
