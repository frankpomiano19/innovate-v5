var idProyecto = PROYECTID;


var datafiletif = new plupload.Uploader({
	runtimes : 'html5,browserplus,flash,silverlight,gears,html4',//browserplus - gears
	browse_button : 'uploadFileTif',
	container: document.getElementById('containertif'),
	chunk_size: '1mb',
	unique_names : false,
	url : BASE_URL + 'uploadtif.php',
	max_file_count: 2,
	prevent_duplicates: true,
	rename: true,
	multipart_params : {'idProyecto': idProyecto},
	//ADD FILE FILTERS HERE
	filters: [
        	{
            	title: 'Image files',
            	extensions: 'tif,TIF'
        	}
        ],
	// Flash settings
	flash_swf_url : BASE_URL + 'plupload/Moxie.swf',
	// Silverlight settings
	silverlight_xap_url : BASE_URL + 'plupload/Moxie.xap',

init: {
		PostInit: function() {
			document.getElementById('filelistTif').innerHTML = '';
			document.getElementById('uploadTif').onclick = function()
			{
				if(datafiletif.files.length > 0)
				{
					$('#loading-ajax-tif').show();
					$('#uploadTif').hide();
					$('#uploadFileTif').hide();
					datafiletif.start();
					//$('#filelist').remove();
					return false;
				}else{
					swal({
                    	title: 'Lo sentimos',
                    	imageUrl: 'assets/img/iconos/cerca.png',
                    	text: 'No hemos detectado que hayas seleccionado tus archivos',
                    	showCancelButton: false,
                    	confirmButtonColor: '#1e662e',
                    	confirmButtonText: 'Entendido'          
            		});
				}
				return false;			
			};
		},
		//############### SUBIDA DE ARCHIVOS ################################//
		FilesAdded: function(up, files) 
		{
				plupload.each(files, function(file) 
				{
				//####### verificamos si hay archivos adjuntos ########//
				var count_files = 0;
					if(datafiletif.files.length > 0)
					{
						$('#uploadTif').show();
						count_files = up.files.length;
						//console.log(count_files);
						$('#cantidad_archivos_tif').html(count_files);
	        		}

					document.getElementById('filelistTif').innerHTML += '<div class="addedFileTif" id="' + file.id + '">' + file.name +' • <b>' + plupload.formatSize(file.size) + '</b><a href="#" id="' + file.id + '" class="removeFile"></a>' + '</div>';
					$('#etiquetas_tif').show();
					//var tamano_file = file.size;
					//console.log(tamano_file);
					//console.log(datafiletif.total.size);
					let fileTotal = Math.floor(datafiletif.total.size / 1000);
					if(fileTotal < 1024){
						fileSize = fileTotal + "KB";
					}else if(fileTotal >= 1024){
						fileSize = Math.round(fileTotal / 1000) + " MB";
					}
					$('#peso_archivos_tif').html(fileSize);
					//console.log(fileTotal);
					//console.log(fileSize);
				});
		},
		Error: function(up, err) 
		{
			//alert(err.code + err.message);
			swal({
                    title: 'Lo sentimos',
                    imageUrl: 'assets/img/iconos/cerca.png',
                    text: err.message,
                    showCancelButton: false,
                    confirmButtonColor: '#1e662e',
                    confirmButtonText: 'Entendido'          
            });
			//document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
		}
	}

}); 
// end of the upload form configuration

// Remove file button //////////////////////////////////////
$('#filelistTif').on('click','.removeFile',function(e)
{               
	datafiletif.removeFile(datafiletif.getFile(this.id));
	//############## ACTUALIZAMOS CUOTA DE PESO ##################//
	let fileTotal = Math.floor(datafiletif.total.size / 1000);
	if(fileTotal < 1024){
		fileSize = fileTotal + "KB";
	}else if(fileTotal >= 1024){
		fileSize = Math.round(fileTotal / 1000) + " MB";
	}
	//############## FIN ACTUALIZAMOS CUOTA DE PESO ##################//
	$('#'+this.id).remove();
	if(datafiletif.files.length > 0)
	{
		$('#uploadTif').show();
		$('#cantidad_archivos_tif').html(datafiletif.files.length);
		$('#peso_archivos_tif').html(fileSize);
    }else{
    	$('#cantidad_archivos_tif').html(datafiletif.files.length);
    	$('#peso_archivos_tif').html(fileSize);
    	$('#uploadTif').hide();
    	$('#etiquetas_tif').hide();
    }

	e.preventDefault();
});

// Progress bar ////////////////////////////////////////////
datafiletif.bind('UploadProgress', function(up, file) 
{
	$('#filelistTif').hide();
	$('#loaderPhotoTif').show();
	$('#imgSuccessTif').hide();
	$('#porcentajeTif').html(up.total.percent +'%');
				
	//var progressBarValue = file.percent;
	var progressBarValue = up.total.percent;
				
	if(progressBarValue == 100)
	{
		$('#loading-ajax-tif').hide();
		$('#loaderIconTif').hide();
		$('#imgSuccessTif').show();
		$('#textResultTif').html('Completado con Éxito');
		$('#porcentajeTif').html('');
		$('#etiquetas_tif').hide();
		//$('#filelist').html('');
	}
});

//datafiletif.bind('BeforeUpload', function(up, file) {
  //   file.target_name = (new Date).getTime() + '_' + file.name;
//});

datafiletif.init();