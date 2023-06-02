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

//################################# FUNCION JQUERY PARA REGISTRARSE ##########################//    
$('document').ready(function()
{              
   $("#txtNdoc").prop('disabled', true);
   $('#alert').hide();
   var txt_Ndoc = $('#txtNdoc').val();
     if (txt_Ndoc !== '' || ($("#txtNdoc").val().length > 0)) 
     {
        $("#txtNdoc").prop('disabled', false);
     }
});

$('#txtDoc').change(function() {

    $("#txtNdoc").prop('disabled', true);
    var documents = $(this).val();
    $('#txtDoc').val(documents);

    if (documents == 1)
    {
        $("#txtNdoc").prop('disabled', false);
        $("#txtNdoc").attr('maxlength','8');

    }else if (documents == 2){
        $("#txtNdoc").prop('disabled', false);
        $("#txtNdoc").attr('maxlength','11');

    }else if (documents == 3){
        $("#txtNdoc").prop('disabled', false);
        $("#txtNdoc").attr('maxlength','15');
    }  

    if(documents !== ""){
        $("#txtNdoc").prop('disabled', false);
    }else{
        $("#txtNdoc").val("");
    }
});
//########################### FIN DE FUNCION PARA REGISTRAR USUARIOS ######################################/
$("document").ready(function () {
  /* validation */
  $("#updateusuario").validate({
    rules: {
      txtDoc: { required: true},
      txtNdoc: { required: true,digits: true},
      txtNom: { required: true },
      txtApe: { required: true },
    },
    messages: {

      txtDoc: { required: "Seleccione Tipo Documento" },  
      txtNdoc: {
        required: "Ingrese Documento",
        digits: "Ingrese solo digitos para el documento",
      },
      txtNom: { required: "Ingrese Nombre completo" },
      txtApe: { required: "Ingrese Apellido completo" },
      
    },
    submitHandler: submitForm,
  });
  /* validation */

  /* form submit */
  function submitForm() {

    var formData = new FormData();

    var USUARIO_ID  =$("#usuario").val();
    var TXT_DOC     =$("#txtDoc").val();
    var TXT_NDOC    =$("#txtNdoc").val();
    var TXT_NOM     =$("#txtNom").val();
    var TXT_APE     =$("#txtApe").val();

    var inputFileImage = document.getElementById("foto");

    formData.append("foto", $('#foto')[0].files[0]);
    formData.append('USUARIO_ID', USUARIO_ID);
    formData.append('TXT_DOC', TXT_DOC);
    formData.append('TXT_NDOC', TXT_NDOC);
    formData.append('TXT_NOM', TXT_NOM);
    formData.append('TXT_APE', TXT_APE);

    $.ajax({
      type: "POST",
      url: "ajax/profile_user/update_datos_user.php",
      data: formData,
      //necesario para subir archivos via ajax
      //cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      beforeSend: function () {
        $('#btn-update').attr('disabled',true);//deshabilitamos el boton
        $('#btn-update').html('<i class="fa fa-refresh"></i> Verificando...');
      },
      success: function (response) {
        if (response.rptas == "1") {
              swal({
                title: 'ERROR!',
                imageUrl: 'assets/img/iconos/cerca.png',
                text: response.msm,
                showCancelButton: false,
                confirmButtonColor: '#1e662e',
                confirmButtonText: 'Entendido'
              });

              $("#btn-update").html('Guardar');
              $('#btn-update').attr('disabled',false);//habilitamos el boton
        //################################################################################//
        } else if (response.rptas == 2) {
              swal({
                title: 'ERROR!',
                imageUrl: 'assets/img/iconos/cerca.png',
                text: response.msm,
                showCancelButton: false,
                confirmButtonColor: '#1e662e',
                confirmButtonText: 'Entendido'
              });

              $("#btn-update").html('Guardar');
              $('#btn-update').attr('disabled',false);//habilitamos el boton
        //################################################################################//      
        } else if (response.rptas == "3") {
                swal({
                      title: "Felicidades",
                      text: response.msm,
                      imageUrl: "assets/img/iconos/party.png",
                      showCancelButton: false,
                      cancelButtonColor: "#afafaf",
                      confirmButtonColor: '#1e662e',
                      confirmButtonText: "Correcto",
                      //cancelButtonText: "Permanecer aqui",
                      closeOnConfirm: false,
                      closeOnCancel: false,
                    },
                    function(isConfirm){
                      if (isConfirm) {
                          window.location.href = 'logout.php'; 
                      } 
                    });

                $("#btn-update").html('Guardar');
                $('#btn-update').attr('disabled',false);//habilitamos el boton
        //################################################################################//        
        } else if (response.rptas == 4) {
              swal({
                title: 'ERROR!',
                imageUrl: 'assets/img/iconos/cerca.png',
                text: response.msm,
                showCancelButton: false,
                confirmButtonColor: '#1e662e',
                confirmButtonText: 'Entendido'
              });

              $("#btn-update").html('Guardar');
              $('#btn-update').attr('disabled',false);//habilitamos el boton
        //##############################################################################//      
        }else if (response.rptas == 5) { 
              swal({
                title: 'ERROR!',
                imageUrl: 'assets/img/iconos/cerca.png',
                text: response.msm,
                showCancelButton: false,
                confirmButtonColor: '#1e662e',
                confirmButtonText: 'Entendido'
              });

              $("#btn-update").html('Guardar');
              $('#btn-update').attr('disabled',false);//habilitamos el boton
        //############################################################################//      
        }else if (response.rptas == 6) { 
             swal({
                title: 'ERROR!',
                imageUrl: 'assets/img/iconos/cerca.png',
                text: response.msm,
                showCancelButton: false,
                confirmButtonColor: '#1e662e',
                confirmButtonText: 'Entendido'
              });

              $("#btn-update").html('Guardar');
              $('#btn-update').attr('disabled',false);//habilitamos el boton
        //##############################################################################//       
        }
      },
    });
    return false;
  }
  /* form submit */

//Validar al subir una imagen - formato
  //------------------------------------//
   $("#foto").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
           swal({
            title: 'Uy, algo salió mal',
            text: "Solo se admiten archivos tipo Imagen JPG/JPGE/jpg",
            confirmButtonColor: '#e74216',
            confirmButtonText: 'Ok',
            imageUrl:'assets/img/iconos/cerca.png'
        });
                $("#foto").val('');
                return false;
           } 
        
    });

});

function ValidarTamano(obj)
{
  var uploadFile = obj.files[0];
  var sizeByte = obj.files[0].size;
  var siezekiloByte = parseInt(sizeByte / 1024);
  if(siezekiloByte > 800){
      swal({
            title: 'Lo Sentimos',
            text: "El tamaño de esta imagen supera el límite permitido",
            confirmButtonColor: '#e74216',
            confirmButtonText: 'Ok',
            imageUrl:'assets/img/iconos/cerca.png'
        });
      $(obj).val('');
      $("#foto").val('');
      return;
  }
}

//######################## LIMPIAR FORMULARIO ##############################################//
function limpiarform(){
    $("#txtNom").val('');
    $("#txtApe").val('');
    $("#txtMail").val('');
    $("#txtClave").val('');
}
//########################## fin estilo loader boton #########################################//
