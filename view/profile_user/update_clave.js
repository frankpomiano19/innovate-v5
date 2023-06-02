
//################################# FUNCION JQUERY PARA REGISTRARSE ##########################//    
$('document').ready(function()
{              
   $("#editClave").validate({
      rules:
     {
         user_password_new: { required: true},
      },
       messages:
      {  
            user_password_new:{  required: "Ingrese clave nueva"},
       },
      submitHandler: updateClave 
       });


//############### ENVIAMOS LOS DATOS  A LA BD ######################################//
function updateClave()
      {     
      var data = $("#editClave").serialize();   
         $.ajax({
            data : data,
            url  : 'ajax/profile_user/modifica_clave.php',
            type : 'POST',
            dataType: 'json',
            beforeSend: function()
            {  
               $('#btnClave').attr("disabled", true);
               $('#btnClave').html('<i class="fa fa-refresh"></i> Verificando...');
            },
            success :  function(datos)
            {                 
               if(datos.rptas== "1")
               {
                $('#editClaveModal').hide();
                swal({
                      title: "Felicidades",
                      text: datos.msm,
                      imageUrl: "assets/img/iconos/felicitaciones.png",
                      showCancelButton: false,
                      cancelButtonColor: "#afafaf",
                      confirmButtonColor: '#1e662e',
                      confirmButtonText: "Iniciar Sesión",
                      //cancelButtonText: "Permanecer aqui",
                      closeOnConfirm: false,
                      closeOnCancel: false,
                    },
                    function(isConfirm){
                      if (isConfirm) {
                          window.location.href = 'logout.php'; //Will take you to Google. 
                      }
                    });

                    $('#btnClave').attr("disabled", false);
                    $('#btnClave').html('<i class="fa fa-refresh"></i> Cambiar Clave');
      
               }else if (datos.rpta == "2"){
                $('#editClaveModal').hide();
                swal({
                        title: 'Lo sentimos',
                        imageUrl: 'assets/img/iconos/cerca.png',
                        text: datos.msm,
                        showCancelButton: false,
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: 'Entendido'   
                },

                function(isConfirm){
                      if (isConfirm) {
                          window.location.href = 'profile.php'; //Will take you to Google. 
                      }
                    });
                       
               }else if (datos.rpta == "3"){

                $('#editClaveModal').hide();
                swal({
                        title: 'Lo sentimos',
                        imageUrl: 'assets/img/iconos/cerca.png',
                        text: datos.msm,
                        showCancelButton: false,
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: 'Entendido'   
                },

                function(isConfirm){
                      if (isConfirm) {
                          window.location.href = 'profile.php'; //Will take you to Google. 
                      }
                    });

               }else if (datos.rpta == "4"){

                $('#editClaveModal').hide();
                swal({
                        title: 'Lo sentimos',
                        imageUrl: 'assets/img/iconos/cerca.png',
                        text: datos.msm,
                        showCancelButton: false,
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: 'Entendido'   
                },

                function(isConfirm){
                      if (isConfirm) {
                          window.location.href = 'profile.php'; //Will take you to Google. 
                      }
                });

               }else if (datos.rpta == "5"){

                $('#editClaveModal').hide();
                swal({
                        title: 'Lo sentimos',
                        imageUrl: 'assets/img/iconos/cerca.png',
                        text: datos.msm,
                        showCancelButton: false,
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: 'Entendido'   
                },

                    function(isConfirm){
                      if (isConfirm) {
                          window.location.href = 'profile.php'; //Will take you to Google. 
                      }
                });
                

               }   
                  
            }

         })
   }  
  
});

