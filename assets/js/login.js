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

/*************************** FUNCION JQUERY PARA VALIDAR ACCESO DE USUARIOS ***************************/
$("document").ready(function () {
     $("#formLogin").validate({
       rules: {
         user_name:     { required: true },
         user_password: { required: true },
       },
       messages: {
         user_name:     { required: "Ingrese su Usuario" },
         user_password: { required: "Ingrese su Clave de Acceso" },
       },
       errorElement: "span",
       submitHandler: submitForm,
     });
     /* validation */

     /* login submit */
     function submitForm() {
       var data = $("#formLogin").serialize();
       $.ajax({
         type: "POST",
         url: "index.php",
         data: data,
         dataType: "json",
         beforeSend: function () {
            $("#btnLogin").html('<i class="fa fa-spinner fa-pulse animate-spin"></i> Verificando...');
            $('#btnLogin').attr('disabled',true);//deshabilitamos el boton
         },
          success: function (response) {
              if (response.rptas == "3") {
                    //window.location.replace("home.php");
                  //window.location.replace("view/panel.php");
                  setTimeout('window.location.href = "home.php"; ', 200);
              } else if (response.rptas == "2"){
                  swal({
                          title: 'Usuario o contraseña incorrectos',
                          imageUrl: 'assets/img/iconos/cerca.png',
                          text: response.msm,
                          showCancelButton: false,
                          confirmButtonColor: '#1e662e',
                          confirmButtonText: 'Intentar nuevamente'
                        
                        });

                        $("#btnLogin").html('Ingresar');
                        $('#btnLogin').attr('disabled',false);//habilitamos el boton

               }else if(response.rptas == "1"){          
                  swal({
                          title: "Lo sentimos...",
                          text: "Hay problemas al momento de registrar en el sistema....",
                          confirmButtonColor: "#EF5350",
                          type: "error"
                  });
               } else if (response.rptas == "4"){
                swal({
                        title: 'Usuario bloqueado temporalmente',
                        imageUrl: 'assets/img/iconos/cerca.png',
                        text: response.msm,
                        showCancelButton: false,
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: 'Intentar nuevamente'
                      
                      });

                      $("#btnLogin").html('Ingresar');
                      $('#btnLogin').attr('disabled',false);//habilitamos el boton

             }    
         },


       });
       return false;
     }
     /* login submit */
});
