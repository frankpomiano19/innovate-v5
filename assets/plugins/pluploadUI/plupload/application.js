// Define Plupload uploader with configuration options
var uploader = new plupload.Uploader({
    runtimes : 'html5,flash,silverlight,html4',
    browse_button : 'fileInput', // you can pass an id...
    url : 'upload.php',
    flash_swf_url : 'plupload/js/Moxie.swf',
    silverlight_xap_url : 'plupload/js/Moxie.xap',
    multi_selection: false,
	
    filters : {
        //max_file_size : '500mb',
        mime_types: [
            {title : "Image files", extensions : "jpg,jpeg,gif,png"},
            //{title : "Video files", extensions : "mp4,avi,mpeg,mpg,mov,wmv"},
            //{title : "Zip files", extensions : "zip"},
            //{title : "Document files", extensions : "pdf,docx,xlsx"}
        ]
    },

    init: {
        PostInit: function() {
            document.getElementById('fileList').innerHTML = '';

            document.getElementById('uploadBtn').onclick = function() {
                if (uploader.files.length < 1) {
                    document.getElementById('statusResponse').innerHTML = '<p style="color:#EA4335;">Please select a file to upload.</p>';
                    return false;
                }else{
                    uploader.start();
                    return false;
                }
            };
        },

        FilesAdded: function(up, files) {
            plupload.each(files, function(file) {
                document.getElementById('fileList').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function(up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            document.querySelector(".progress").innerHTML = '<div class="progress-bar" style="width: '+file.percent+'%;">'+file.percent+'%</div>';
        },
        
        FileUploaded: function(up, file, result) {
            var responseData = result.response.replace('"{', '{').replace('}"', '}');
            var objResponse = JSON.parse(responseData);
            document.querySelector('.statusResponse').innerHTML = '<p style="color:#198754;">' + objResponse.result.message + '</p>';
        },

        Error: function(up, err) {
            document.querySelector('.statusResponse').innerHTML = '<p style="color:#EA4335;">Error #' + err.code + ': ' + err.message + '</p>';
        }
    }
});

// Initialize Plupload uploader
uploader.init();