function initFileUploader() {
    $('input[name="onebutton"]').fileuploader({
        theme: "onebutton"
    }), $('input[name="fielduploader"]').fileuploader({
        addMore: !0
    }), $('input[name="thumbnails"]').fileuploader({
        extensions: ["jpg", "jpeg", "png", "gif", "bmp"],
        changeInput: " ",
        theme: "thumbnails",
        enableApi: !0,
        addMore: !0,
        thumbnails: {
            box: '<div class="fileuploader-items"><ul class="fileuploader-items-list"><li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><span>+</span></div></li></ul></div>',
            item: '<li class="fileuploader-item"><div class="fileuploader-item-inner"><div class="thumbnail-holder">${image}</div><div class="actions-holder"><a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a><span class="fileuploader-action-popup"></span></div><div class="progress-holder">${progressBar}</div></div></li>',
            item2: '<li class="fileuploader-item"><div class="fileuploader-item-inner"><div class="thumbnail-holder">${image}</div><div class="actions-holder"><a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a><span class="fileuploader-action-popup"></span></div></div></li>',
            startImageRenderer: !0,
            canvasImage: !1,
            _selectors: {
                list: ".fileuploader-items-list",
                item: ".fileuploader-item",
                start: ".fileuploader-action-start",
                retry: ".fileuploader-action-retry",
                remove: ".fileuploader-action-remove"
            },
            onItemShow: function(e, i) {
                i.find(".fileuploader-thumbnails-input").insertAfter(e.html), "image" == e.format && e.html.find(".fileuploader-item-icon").hide()
            }
        },
        afterRender: function(e, i, a, l) {
            var n = e.find(".fileuploader-thumbnails-input"),
                r = $.fileuploader.getInstance(l.get(0));
            n.on("click", (function() {
                r.open()
            }))
        }
    }), $('input[name="dragndrop"]').fileuploader({
        changeInput: '<div class="fileuploader-input"><div class="fileuploader-input-inner"><img src="assets/img/fileuploader-dragdrop-icon.png"><h3 class="fileuploader-input-caption"><span>Drag and drop invoices here</span></h3><p>or</p><div class="fileuploader-input-button"><span>Browse Files</span></div></div></div>',
        theme: "dragdrop",
        upload: {
            url: "php/ajax_upload_file.php",
            data: null,
            type: "POST",
            enctype: "multipart/form-data",
            start: !0,
            synchron: !0,
            beforeSend: null,
            onSuccess: function(e, i) {
                var a = {};
                try {
                    a = JSON.parse(e)
                } catch (e) {
                    a.hasWarnings = !0
                }
                if (a.isSuccess && a.files[0] && (i.name = a.files[0].name, i.html.find(".column-title > div:first-child").text(a.files[0].name).attr("title", a.files[0].name)), a.hasWarnings) {
                    for (var l in a.warnings) alert(a.warnings);
                    return i.html.removeClass("upload-successful").addClass("upload-failed"), this.onError ? this.onError(i) : null
                }
                i.html.find(".column-actions").append('<a class="fileuploader-action fileuploader-action-remove fileuploader-action-success" title="Remove"><i></i></a>'), setTimeout((function() {
                    i.html.find(".progress-bar2").fadeOut(400)
                }), 400)
            },
            onError: function(e) {
                var i = e.html.find(".progress-bar2");
                i.length > 0 && (i.find("span").html("0%"), i.find(".fileuploader-progressbar .bar").width("0%"), e.html.find(".progress-bar2").fadeOut(400)), "cancelled" != e.upload.status && 0 == e.html.find(".fileuploader-action-retry").length && e.html.find(".column-actions").prepend('<a class="fileuploader-action fileuploader-action-retry" title="Retry"><i></i></a>')
            },
            onProgress: function(e, i) {
                var a = i.html.find(".progress-bar2");
                a.length > 0 && (a.show(), a.find("span").html(e.percentage + "%"), a.find(".fileuploader-progressbar .bar").width(e.percentage + "%"))
            },
            onComplete: null
        },
        onRemove: function(e) {
            $.post("./php/ajax_remove_file.php", {
                file: e.name
            })
        },
        captions: {
            feedback: "Drag and drop files here",
            feedback2: "Drag and drop files here",
            drop: "Drag and drop files here"
        }
    })
}
