<?php 
  require_once "config/class.php";
  $tra = new Login;
  if (isset($_POST['btnRegister'])) {
      $reg = $tra->RegistrarUsuarios();
      exit;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>titulo</title>
    <!-- metas -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- css bootstrap -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- style personalizado -->
    <link media="all" type="text/css" rel="stylesheet" href="assets/css/other_personalizado.css">
    <!-- styles principales -->
    <link media="all" type="text/css" rel="stylesheet" href="assets/css/default.css">
    <link media="all" type="text/css" rel="stylesheet" href="assets/css/animation.css"/>
    <link media="all" type="text/css" rel="stylesheet" href="assets/css/login.css">
    <link media="all" type="text/css" rel="stylesheet" href="assets/css/normalize.css">
    <!-- sweet alert -->
    <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/sweet_alert/sweet_alert.css">
     <!-- loader -->
    <link media="all" type="text/css" rel="stylesheet" href="assets/css/load.css">
    <!-- iconos other -->
    <link  rel="stylesheet" href="fonts/kececon.css">
    <link  rel="stylesheet" href="assets/css/remixicon.min.css">
    <!-- icon -->
    <link rel="icon" href="assets/img/logo-icon.png">
  </head>
 
<body>

<!-- Preloader -->
<div id="loading" class="preloader-it" style="display: block;">
    <div class="loader-elm">
        <img src="assets/img/logos/logo.png" alt="">
        <div class="spinner"></div>
        <!-- -->
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>        
<!-- /Preloader -->   

<section id="wrapper" class="new-login-register">
      <!-- error login -->
      <div class="lg-info-panel-cuenta">
          <div class="inner-panel">
                   
          </div>
      </div>
      <!-- fin div error -->
      <div class="new-login-box" style="margin-top: 2% !important;">
        <div class="white-box">
          <!-- div para login -->
          <div id="loginform" style="display: block;"><!-- -->
            <!-- contenido del div de login  -->
            <form class="form new-lg-form" name="formRegistro" id="formRegistro"  action="" style="padding-top: 0px;" method="post">
                    <!-- logo -->
                    <h3 class="box-title m-b-0 text-center">
                         <img src="assets/img/logos/logo.png" alt="Logo-Groen" width="220" height="60">
                    </h3>
                    <!-- fin logo -->  
                    <div class="row">
                      <div class="col-md-12 m-t-20">
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
                                <span id="mostrar" class="ri-lock-password-line color-primary"></span>
                              </div>
                              <input class="form-control cajastxt" name="txtClave" id="txtClave" type="password"  autocomplete="off" maxlength="15" placeholder="************" aria-required="true">
                              <!-- -->
                          </div> 
                          <!-- fin cajas con iconos  -->           
                        </div>
                      </div>
                      <!-- -->
                    </div>
                    <!-- -->
                    <div class="form-group text-center m-t-20">
                      <div class="col-md-12">
                        <button  style="border-radius: 40px !important;height: 48px !important;line-height: 20px;padding-top: 14px;padding-bottom: 14px;box-shadow: 0px 6px 18px -5px rgb(30, 102, 46,1);" class="btn btn-danger btn-lg btn-block text-uppercase"  title="" name="btnRegister" id="btnRegister"  type="submit">
                          Registrarse
                        </button>
                      </div>
                      <!-- -->
                    </div>
                    <!-- -->
              </form>
                    <div class="col-md-12 text-center" style="margin-top: 30px;">
                        <label class="Subtitle5BlackL"> 
                          ¿Ya tienes una cuenta? 
                        </label>
                        <a href="index.php" class="Subtittle4vinculo">
                          Inicia Sesión
                        </a> 
                    </div>
                    <!-- fin del boton -->
          </div>
          <!-- fin del div login  -->
        </div>
      </div>            
</section>
<!-- -->
<!-- script jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery 2.1.4 -->
<script src="assets/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- sweet alert -->
<script src="assets/plugins/sweet_alert/sweet_alert.min.js"></script>
<!-- titulos paginas -->
<script src="assets/js/titulos.js"></script>
<!-- validation -->
<script src="assets/js/validation.min.js"></script>
<!-- jshtml5-->
<script src="assets/js/wysihtml5.js"></script>
<!-- cookie -->
<script src="assets/js/cookie.js"></script>
<!-- validate button -->
<script src="assets/js/validate_button_register.js"></script>
<!-- script general sistema -->
<script src="assets/js/register_cuenta.js"></script>
<!-- load -->
<script type="text/javascript">
/*****Load function start*****/
  $(window).on("load",function(){
      //$(".preloader-it").css("display", "none");
      $(".preloader-it").delay(600).fadeOut("slow");
  });
/*****Load function* end*****/
</script>
<script>
$(document).ready( function(){
    $('#mostrar').click(function(){
      if($(this).hasClass('ri-lock-password-line'))
        {
            $('#txtClave').removeAttr('type');
            $('#mostrar').addClass('ri-lock-unlock-line').removeClass('ri-lock-password-line');
        }else{
            $('#txtClave').attr('type','password');
            $('#mostrar').addClass('ri-lock-password-line').removeClass('ri-lock-unlock-line');
        }
       });
});
</script>

  </body>
</html>
