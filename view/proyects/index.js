//################# limpiar campos al ocultar modal ###################//
function limpia_proyecto()
  {
    $('#txtname').val("");
  }  
//################### limpiamos los campos al ocultar el modal ##############//
$('#addProyect').on('hidden.bs.modal', function(e)
{
    limpia_proyecto();
});
//################# fin limpiar campos al ocultar modal ######################//
$("document").ready(function () {
    listProyects();
  /* validation */
  $("#addProyecto").validate({
    rules: {
      txtname: { required: true},
    },
    messages: {
      txtname: { required: "Ingrese un nombre para el proyecto" },
    },
    submitHandler: registerProyect,
  });
  /* validation */
//###################### enviar datos por ajax ##################################//
function registerProyect()
  {     

    var data = $("#addProyecto").serialize(); 
    $.ajax({
            data : data,
            url  : 'ajax/proyects/Proyect.php?process=guardarProyecto',
            type : 'POST',
            dataType: 'json',
            beforeSend: function()
            {  
               $('#btnAdd').attr("disabled", true);
               $('#btnAdd').html('<i class="fa fa-refresh"></i> REGISTRANDO...');
            },
            success :  function(datos)
            {  
              //#################### SENTENCIA 1 ##########################################//                
               if(datos.rptas== "1")
               {
                  $('#addProyect').hide();
                  swal({
                        title: "Felicidades",
                        text: datos.msm,
                        imageUrl: "assets/img/iconos/felicitaciones.png",
                        showCancelButton: false,
                        cancelButtonColor: "#afafaf",
                        confirmButtonColor: '#1e662e',
                        confirmButtonText: "Conforme",
                        //cancelButtonText: "Permanecer aqui",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                      },
                      function(isConfirm){
                        if (isConfirm) {
                            window.location.href = 'proyects.php'; //Will take you to Google. 
                        }
                      });

                      $('#btnAdd').attr("disabled", false);
                      $('#btnAdd').html('REGISTRAR');
               //#################### SENTENCIA 2 ##########################################// 
               }else if (datos.rpta == "2"){
                  $('#addProyect').hide();
                  swal({
                          title: 'Lo sentimos',
                          imageUrl: 'assets/img/iconos/cerca.png',
                          text: datos.msm,
                          showCancelButton: false,
                          confirmButtonColor: '#1e662e',
                          confirmButtonText: 'Entendido'   
                  });
               //#################### SENTENCIA 3 ##########################################//         
               }else if (datos.rpta == "3"){
                $('#addProyect').hide();
                  swal({
                          title: 'Lo sentimos',
                          imageUrl: 'assets/img/iconos/cerca.png',
                          text: datos.msm,
                          showCancelButton: false,
                          confirmButtonColor: '#1e662e',
                          confirmButtonText: 'Entendido'   
                  });
              //#################### SENTENCIA 4 ##########################################// 
               }
        }

         })
   }  

});

//########## CARGAMOS EL CONTENIDO DE LOS PROYECTOS ##########################//
  function listProyects()
  {
    var proceso = 'listarProyect';
    $("#loader").fadeIn('slow');
      $.ajax({
        url:'ajax/proyects/Proyect.php?process='+proceso,
      beforeSend: function(objeto)
      {
        $('#loader').show();
      },
      success:function(data)
      {
        $('#loader').hide();
        $(".data_div").html(data).fadeIn('slow');           
      }

      })
  }
//########## FIN CARGAMOS EL CONTENIDO DE LOS PROYECTOS #####################//

//############ RUTEAMOS A LA PAGINA PARA AGREGAR LAS FOTOS ##################//
function mostrar(token_proyectos)
{
  $.post("../ajax/diagnostico.php?op=mostrar",{iddiagnostico : iddiagnostico}, function(data, status)
  {
    data = JSON.parse(data);    
    mostrarform(true);

    $("#codigo").val(data.codigo);
    $("#enfermedad").val(data.enfermedad);
    $("#iddiagnostico").val(data.iddiagnostico);

  })
}

//############ FIN DEL RUTEO DE PAGINA ######################################//   