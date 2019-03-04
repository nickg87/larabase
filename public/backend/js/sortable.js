$(function() {
    // for images
    $("#allGallery, #selectedImages").sortable({
        connectWith: '#selectedImages',
        start: function (event, ui) {
            ui.item.data('parentID', ui.item.parent().attr("id"));
        },
        stop: function(event, ui) {
            var parentID = ui.item.data('parentID');
            if (ui.item.hasClass("grid-square")) {
                index_stop = ui.item.index();
                if (parentID !== ui.item.parent().attr("id")) {
                    var thisId = ui.item.attr("id");
                    var thisTitle = ui.item.data("original-title");
                    var newElem = $('<li/>', {
                        "class" : 'list-group-item tinted',
                        "id": thisId
                    });
                    var elem = thisId.split('-');
                    var id = elem[1];
                    var page = elem[0];
                    var sorting = index_stop + 1;
                    $.ajax({
                        url: 'gallery/add',
                        type: 'GET',
                        data: {
                            page: page,
                            image_id: id,
                            sorting: sorting
                        },
                        success: function (result) {
                            console.log(result);
                            newElem.append('<img src="'+ ui.item.children('img').attr('src') +'" width="40"/> '+ thisTitle +' <a class="deleteImage pull-right" href="#"><i class="zmdi zmdi-delete"></i></a>');
                            if ((ui.item.next().length<=0)) {
                                newElem.appendTo(ui.item.parent());
                            } else {
                                newElem.insertBefore(ui.item.next());
                            }
                            ui.item.remove();
                            var count = $("#selectedImages li").length;
                            $("#counter").text( count);
                        },
                    });


                }
            }
            $.map($(this).find('li'), function(el) {
                var elem = el.id.split('-');
                var id = elem[1];
                var page = elem[0];
                var sorting = $(el).index()+1;
                $.ajax({
                    url: 'gallery/ord',
                    type: 'GET',
                    data: {
                        page: page,
                        image_id: id,
                        sorting: sorting
                    },
                    /*dataType: 'json',
                    success: function(data){
                        console.log(responseText); //will alert ok
                    }*/
                    success: function (result) {
                        console.log(result);
                    },
                });

            });
        }
    }).disableSelection();
    $(this).on('click', '.deleteImage', function(event) {
        event.preventDefault();
        var el = $(this).parent();
        var elem = el.attr('id').split('-');
        var id = elem[1];
        var page_id = elem[0];
            $.ajax({
                url: 'gallery/del',
                type: 'GET',
                data: {
                    page: page_id,
                    image_id: id
                },
                success: function (result) {
                    console.log(result);
                    el.fadeOut(400);
                    el.remove();
                    var count = $("#selectedImages li").length;
                    $("#counter").text(count);
                },
            });
        });

    // for files
    $("#allDownload, #selectedFiles").sortable({
        connectWith: '#selectedFiles',
        start: function (event, ui) {
            ui.item.data('parentID', ui.item.parent().attr("id"));
        },
        stop: function(event, ui) {
            var parentID = ui.item.data('parentID');
            if (ui.item.hasClass("allDownload")) {
                index_stop = ui.item.index();
                if (parentID !== ui.item.parent().attr("id")) {
                    var thisId = ui.item.attr("id");
                    var thisTitle = ui.item.data("original-title");
                    var newElem = $('<li/>', {
                        "class" : 'list-group-item tinted',
                        "id": thisId
                    });
                    var elem = thisId.split('-');
                    var id = elem[1];
                    var page = elem[0];
                    var sorting = index_stop + 1;
                    $.ajax({
                        url: 'files/add',
                        type: 'GET',
                        data: {
                            page: page,
                            file_id: id,
                            sorting: sorting
                        },
                        success: function (result) {
                            console.log(result);
                            newElem.append(thisTitle +' <a class="deleteFile pull-right" href="#"><i class="zmdi zmdi-delete"></i></a>');
                            if ((ui.item.next().length<=0)) {
                                newElem.appendTo(ui.item.parent());
                            } else {
                                newElem.insertBefore(ui.item.next());
                            }
                            ui.item.remove();
                            var count = $("#selectedFiles li").length;
                            $("#counter").text(count);
                        },
                    });


                }
            }
            if ($('#selectedFiles').children('li').length > 0) {
                $.map($('#selectedFiles').find('li'), function (el) {
                    var elem = el.id.split('-');
                    var id = elem[1];
                    var page = elem[0];
                    var sorting = $(el).index() + 1;
                    $.ajax({
                        url: 'files/ord',
                        type: 'GET',
                        data: {
                            page: page,
                            file_id: id,
                            sorting: sorting
                        },
                        success: function (result) {
                            console.log(result);
                        },
                    });

                });
            }
        }
    });
    $( "#allDownload, #selectedFiles" ).disableSelection();
    $(this).on('click', '.deleteFile', function(event) {
        event.preventDefault();
        var el = $(this).parent();
        var elem = el.attr('id').split('-');
        var id = elem[1];
        var page = elem[0];
        $.ajax({
            url: 'files/del',
            type: 'GET',
            data: {
                page: page,
                file_id: id
            },
            success: function (result) {
                console.log(result);
                el.fadeOut(400);
                el.remove();
                var count = $("#selectedFiles li").length;
                $("#counter").text(count);
            },
        });
    });
});



