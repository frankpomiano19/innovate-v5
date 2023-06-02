// Initialize the widget when the DOM is ready
$(function() {
	$("#uploader").plupload({
		//############### General settings ###########################
		runtimes : 'html5,flash,silverlight,html4',
		url : 'assets/plugins/pluploadUI/upload.php',
		//max_file_size : '1000mb',
		//max_file_count: 20, // user can add no more then 20 files at a time
		//chunk_size : '1mb',
		rename: true,
		multiple_queues : true,
		//######## Resize images on clientside if we can ##############
		resize : {width : 320, height : 240, quality : 90},
		//######## Rename files by clicking on their titles ###########
		rename: true,
		//######## Sort files #########################################
		sortable: true,
		//######## Specify what files to browse for ##################
		filters : [
			{title : "Zip files", extensions : "zip"}
		],
		//######## Flash settings ###################################
		flash_swf_url : 'plupload/js/Moxie.swf',
		//######## Silverlight settings #############################
		silverlight_xap_url : 'plupload/js/Moxie.xap'
	});

	// Client side form validation
	$('form').submit(function(e) {
        var uploader = $('#uploader').plupload('getUploader');

        // Files in queue upload them first
        if (uploader.files.length > 0) {
            // When all files are uploaded submit form
            uploader.bind('StateChanged', function() {
            	alert('You must at least upload one file1.');
                if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                    $('form')[0].submit();
                }
            });
                
            uploader.start();
        } else
            alert('You must at least upload one file.');

        return false;
    });
	 

});