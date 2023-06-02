jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,. ]+$/i.test(value);
});
/*************************** FUNCIÓN SOLO ACEPTA LETRAS ***************************/
function ValidaSoloLetras() {
           if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
              event.returnValue = false;
      }
/*************************** FIN FUNCIÓN SOLO ACEPTA LETRAS **********************/   

/*************************** FUNCIÓN SOLO ACEPTA NÚMEROS ***************************/
function ValidaSoloNumeros() {
       if ((event.keyCode < 48) || (event.keyCode > 57)) 
          event.returnValue = false;
    }
/*************************** FIN FUNCIÓN SOLO ACEPTA NUMEROS **********************/ 
$('document').ready(function(){  
   $('#btnRegister').attr('disabled',true);//deshabilitamos el boton
});
//########################## Estilo loader boton ##############################################//
function loadBtn(){
    $('#texto').html("Cargando...");
    $('#register').attr("disabled", true);
    $("#icon1").hide();
    $("#icon2").show();
    $('#btn-c').hide();
}
//######################## LIMPIAR FORMULARIO ##############################################//
function limpiarform(){
    $("#txtNom").val('');
    $("#txtApe").val('');
    $("#txtMail").val('');
    $("#txtClave").val('');
}
//########################## fin estilo loader boton #########################################//  

/* FUNCION JQUERY PARA VALIDAR REGISTRO DE USUARIOS ADMINSTRADOR */
$("document").ready(function () {
  /* validation */
  $("#formRegistro").validate({
    rules: {

        txtNom: { required: true, lettersonly: true},
        txtApe: { required: true, lettersonly: true},
        txtMail:{ required: true, email: true},
        txtClave: { required: true},
    },
    messages: {

        txtNom:{  
                required: "Ingrese sus Nombres",
                pattern : "*Por favor introduzca s\u00f3lo letras"
                },
        txtApe:{  
                required: "Ingrese sus Apellidos",
                pattern : "*Por favor introduzca s\u00f3lo letras"
                },
        txtMail:{  
                required: "Ingrese su Correo Electronico", 
                email: "Ingrese un Correo Electronico Valido" 
                },
        txtClave:{  
                required: "Ingrese una Clave"
                },
    },
    submitHandler: submitForm,
  });
  /* validation */

  /* form submit */
  function submitForm() {
    var data = $("#formRegistro").serialize();
    $.ajax({
      type: "POST",
      url: "account-register.php",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $("#btnRegister").html('<i class="fa fa-spinner fa-pulse animate-spin"></i> Procesando...');
        $('#btnRegister').attr('disabled',true);//deshabilitamos el boton
      },
      success: function (data) {
        if (data.rptas == "1")
        {
                swal({
                        title: 'Lo sentimos',
                        imageUrl: 'assets/img/iconos/cerca.png',
                        text: data.msm,
                        showCancelButton: false,
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: 'Intentar nuevamente'
                            
                });

                $("#btnRegister").html('REGISTRARSE');
                $('#btnRegister').attr('disabled',false);//deshabilitamos el boton
        //#############################################################################//         
        } else if (data.rptas == "2") {
                swal({
                        title: 'Lo sentimos',
                        imageUrl: 'assets/img/iconos/cerca.png',
                        text: data.msm,
                        showCancelButton: false,
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: 'Intentar nuevamente'
                            
                });

                $("#txtMail").css('border-color', 'red');
                $("#txtMail").focus();
                $("#btnRegister").html('REGISTRARSE');
                $('#btnRegister').attr('disabled',false);//deshabilitamos el boton
        //#############################################################################//        
        } else if (data.rptas == "3") {
                
                swal({
                        title: "Felicidades",
                        text: data.msm,
                        imageUrl: "assets/img/iconos/felicitaciones.png",
                        showCancelButton: false,
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: 'Entendido'    
                });

                $("#btnRegister").html('REGISTRARSE');
                $('#btnRegister').attr('disabled',true);//deshabilitamos el boton
                $("#txtMail").css('border-color', 'none');
                limpiarform();
        //#############################################################################//   
        } else if (data.rptas == "4") {
                swal({
                    title: 'Error!',
                    imageUrl: 'assets/img/iconos/cerca.png',
                    text: data.msm,
                    showCancelButton: false,
                    confirmButtonColor: '#1e662e',
                    confirmButtonText: 'Intentar nuevamente' 
                });

                $("#btnRegister").html('REGISTRARSE');
                $('#btnRegister').attr('disabled',false);//deshabilitamos el boton
        //#############################################################################//         
        } else {

                swal({
                    title: "Lo sentimos...",
                    text: "No pudimos realizar el registro. Comuníquese con sistemas...!",
                    confirmButtonColor: '#1e662e',
                    type: "error"
                });
                $("#btnRegister").html('REGISTRARSE');
                $('#btnRegister').attr('disabled',false);//deshabilitamos el boton
        }
      },
    });
    return false;
  }
  /* form submit */
});




