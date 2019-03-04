var total_files_counter = 0;
Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFilesize: 16,
    acceptedFiles: "application/pdf, .doc, .docx, .xls",
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    dictFileTooBig: 'File is larger than 16MB',
    timeout: 10000,

    init: function () {
        this.on("removedfile", function (file) {
            //console.log(file.name);
            $.post({
                url: '/admin/media/file/destroyDZ',
                data: {id: file.name, _token: $('[name="_token"]').val()},

                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    total_files_counter--;
                    $("#counter").text("# " + total_photos_counter);
                }
            });
        });

    },
    success: function (file, done) {
        if (typeof done.message !== 'undefined') {
            total_files_counter++;
            $("#counter").text("# " + total_files_counter);
            this.on("queuecomplete", function (file, done) {
                location.reload();
            });
        }
        if (typeof done.error !== 'undefined') {
            alert(done.error);
        }
    }
};