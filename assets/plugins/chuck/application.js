var idProyecto = PROYECTID;
//var tamano_file = $('#filelist').html();

//var tamano_file = file.size;
//console.log(tamano_file);

var datafile = new plupload.Uploader({
	runtimes : 'html5,browserplus,flash,silverlight,gears,html4',//browserplus - gears
	browse_button : 'uploadFile',
	container: document.getElementById('container'),
	chunk_size: '1mb',
	unique_names : false,
	url : BASE_URL + 'upload.php',
	max_file_count: 2,
	prevent_duplicates: true,
	rename: true,
	multipart_params : {'idProyecto': idProyecto},
	//ADD FILE FILTERS HERE
	filters: [
        	{
            	title: 'Image files',
            	extensions: 'jpg,jpeg,gif,png,JPG,JPEG,GIF,PNG,tif,TIF'
        	}
        ],
	// Flash settings
	flash_swf_url : BASE_URL + 'plupload/Moxie.swf',
	// Silverlight settings
	silverlight_xap_url : BASE_URL + 'plupload/Moxie.xap',

init: {
		PostInit: function() {
			document.getElementById('filelist').innerHTML = '';
			document.getElementById('upload').onclick = function()
			{
				if(datafile.files.length > 0)
				{
					$('#loading-ajax').show();
					$('#upload').hide();
					$('#uploadFile').hide();
					datafile.start();
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
					if(datafile.files.length > 0)
					{
						$('#upload').show();
						count_files = up.files.length;
						//console.log(count_files);
						$('#cantidad_archivos').html(count_files);
	        		}

					document.getElementById('filelist').innerHTML += '<div class="addedFile" id="' + file.id + '">' + file.name +' • <b>' + plupload.formatSize(file.size) + '</b><a href="#" id="' + file.id + '" class="removeFile"></a>' + '</div>';
					$('#etiquetas_imgs').show();
					//var tamano_file = file.size;
					//console.log(tamano_file);
					//console.log(datafile.total.size);
					let fileTotal = Math.floor(datafile.total.size / 1000);
					if(fileTotal < 1024){
						fileSize = fileTotal + "KB";
					}else if(fileTotal >= 1024){
						fileSize = Math.round(fileTotal / 1000) + " MB";
					}
					$('#peso_archivos').html(fileSize);
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
$('#filelist').on('click','.removeFile',function(e)
{               
	datafile.removeFile(datafile.getFile(this.id));
	//############## ACTUALIZAMOS CUOTA DE PESO ##################//
	let fileTotal = Math.floor(datafile.total.size / 1000);
	if(fileTotal < 1024){
		fileSize = fileTotal + "KB";
	}else if(fileTotal >= 1024){
		fileSize = Math.round(fileTotal / 1000) + " MB";
	}
	//############## FIN ACTUALIZAMOS CUOTA DE PESO ##################//
	$('#'+this.id).remove();
	if(datafile.files.length > 0)
	{
		$('#upload').show();
		$('#cantidad_archivos').html(datafile.files.length);
		$('#peso_archivos').html(fileSize);
    }else{
    	$('#cantidad_archivos').html(datafile.files.length);
    	$('#peso_archivos').html(fileSize);
    	$('#upload').hide();
    	$('#etiquetas_imgs').hide();
    }

	e.preventDefault();
});

// Progress bar ////////////////////////////////////////////
datafile.bind('UploadProgress', function(up, file) 
{
	$('#filelist').hide();
	$('#loaderPhoto').show();
	$('#imgSuccess').hide();
	$('#porcentaje').html(up.total.percent +'%');
				
	//var progressBarValue = file.percent;
	var progressBarValue = up.total.percent;
				
	if(progressBarValue == 100)
	{
		$('#loading-ajax').hide();
		$('#loaderIcon').hide();
		$('#imgSuccess').show();
		$('#textResult').html('Completado con Éxito');
		$('#porcentaje').html('');
		$('#etiquetas_imgs').hide();
		//$('#filelist').html('');
	}
});

//datafile.bind('BeforeUpload', function(up, file) {
  //   file.target_name = (new Date).getTime() + '_' + file.name;
//});

datafile.init();