<?php
require_once "config/class.php";
$tra = new Login();
$db = new DB;

if (isset($_POST['btnLogin'])) {
  $log = $tra->Logueo();
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
  <link media="all" type="text/css" rel="stylesheet" href="assets/css/login.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/css/animation.css" />
  <link media="all" type="text/css" rel="stylesheet" href="assets/css/normalize.css">
  <!-- sweet alert -->
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/sweet_alert/sweet_alert.css">
  <!-- iconos other -->
  <link rel="stylesheet" href="fonts/kececon.css">
  <link rel="stylesheet" href="assets/css/remixicon.min.css">
  <!-- icon -->
  <link rel="icon" href="assets/img/logo-icon.png">
  <!-- script jquery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
  <script src="https://libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="assets/js/jquery.js"></script>
  <!-- jQuery 2.1.4 -->
  <script src="assets/js/jQuery-2.1.4.min.js"></script>
  <!-- sweet alert -->
  <script src="assets/plugins/sweet_alert/sweet_alert.min.js"></script>
  <!-- titulos paginas -->
  <script src="assets/js/titulos.js"></script>
  <!-- validation -->
  <script src="assets/js/validation.min.js"></script>
  <!-- script general valida -->
  <script src="assets/js/login.js"></script>
</head>

<body>

  <?php
  include("modal/cambiar_clave.php");
  ?>

  <section id="wrapper" class="new-login-register">
    <!-- imagen lado iz -->
    <div class="lg-info-panel">
      <div class="inner-panel">

      </div>
    </div>
    <!-- fin imagen lado iz -->
    <div class="new-login-box">
      <div class="white-box">
        <div id="loginform" style="display: block;"><!-- -->
          <!-- contenido del div de login  -->

          <form class="form new-lg-form" method="post" action="" name="formLogin" id="formLogin">
            <h3 class="box-title m-b-0 text-center">
              <img src="assets/img/logos/logo.png" alt="Logo" width="220" height="60">
            </h3>
            <!-- -->
            <!-- <h2 style="font-weight: bold;text-align: center;">
                      Bienvenido a INNOVATE
                    </h2>-->
            <!-- -->
            <div class="row m-t-40">
              <div class="col-md-12 m-t-20">
                <div class="form-group has-feedback">
                  <label class="control-label">
                    Ingrese su Usuario:
                  </label>
                  <!-- cajas con iconos  -->
                  <div class="input-group input-group-merge">
                    <div class="input-icon">
                      <span class="ri-user-3-line color-primary"></span>
                    </div>
                    <input class="form-control cajastxt" name="user_name" id="user_name" type="text" autocomplete="off" placeholder="Ingrese su Usuario" maxlength="45" aria-required="true">
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
                    <input class="form-control cajastxt" name="user_password" id="user_password" type="password" autocomplete="off" placeholder="Ingrese su Clave" maxlength="15" aria-required="true">
                  </div>
                  <!-- fin cajas con iconos  -->
                </div>
              </div>
              <!-- -->
            </div>
            <!-- -->
            <div class="row">
              <div class="col-md-12 text-center">
                <a href="javascript:void(0)" id="to-recover" data-href="#" data-toggle="modal" data-target="#recuperarModal" data-placement="left" data-backdrop="static" data-keyboard="false" class="Subtittle4vinculo">
                  <i class="ri-lock-2-line"></i> Olvidé mi Contraseña
                </a>
              </div>
            </div>
            <!-- -->
            <div class="form-group text-center m-t-20">
              <div class="col-md-12">
                <button style="border-radius: 40px !important;height: 48px !important;line-height: 20px;padding-top: 14px;padding-bottom: 14px;box-shadow: 0px 6px 18px -5px rgb(30, 102, 46,1);" class="btn btn-danger btn-lg btn-block text-uppercase" name="btnLogin" id="btnLogin" type="submit">
                  Ingresar
                </button>
              </div>
              <!-- -->
            </div>
            <!-- -->
          </form>
          <div class="col-md-12 text-center" style="margin-top: 30px;">
            <label class="Subtitle5BlackL">
              ¿No tienes cuenta?
            </label>
            <a href="account-register.php" class="Subtittle4vinculo">
              Regístrate Aqui
            </a>
          </div>
          <!-- fin del boton -->
        </div>
        <!-- fin del div login  -->
      </div>
    </div>
  </section>

  <!-- Bootstrap 3.3.5 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- oculta mensaje error -->
  <script>
    window.setTimeout(function() {
      $('#alert').fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 5000);
  </script>
  <!-- validate button -->
  <script src="assets/js/validate_button_login.js"></script>
  <!-- mostrar clave -->
  <script>
    $(document).ready(function() {
      $('#mostrar').click(function() {
        if ($(this).hasClass('ri-lock-password-line')) {
          $('#user_password').removeAttr('type');
          $('#mostrar').addClass('ri-lock-unlock-line').removeClass('ri-lock-password-line');
        } else {
          $('#user_password').attr('type', 'password');
          $('#mostrar').addClass('ri-lock-password-line').removeClass('ri-lock-unlock-line');
        }
      });
    });
  </script>
</body>

</html>
<?php
//}
?>