
$(document).ready(function () {

    $('.form-edit').hide();

    $('.edit').click(function () {
        $(this).parent().find('.form-edit').toggle();
    });

    $('.submit').click(function (e) {
        e.preventDefault();
        var ligne = $('.ligne').text();
        var date = $('.date').text();
        var form = $(this).parent();

        input_file = form.find('.input_file').prop('files')[0];
        id_global = form.find('.id_global').val();
        photo_name = form.find('.photo_name').val();
        path_photo = form.find('.path_photo').val();
        img = $(this).parent().parent().parent().parent().find('.container-img');

        editApi(input_file, id_global, photo_name, img, ligne, date);
    });

});

function remove(id_global, photo_name, elem) {
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi, '');
    $('.loader').append('<img src="' + base_url + '/images/gears.svg" class="svg-loader" />');
    var ligne = $('.ligne').text();
    var date = $('.date').text();
    removeApi(id_global, photo_name, elem, ligne, date);
}



function viewImg(ligne, date_format, photo_name) {
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi, '');
    window.open(base_url + "photos/pa/" + ligne + '_' + date_format + "/" + photo_name, "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no, scrollbars=yes,resizable=yes,top=100,left=100,width=700,height=500");
}

function editApi(input_file, id_global, photo_name, img, ligne, date) {

    var data = new FormData();
    data.append('input_file', input_file);
    data.append('id_global', id_global);
    data.append('photo_name', photo_name);

    $.ajax({
        url: $('.url_photos_api').text() + "_PA/update-photo-pa",
        type: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            img.attr("src", path_photo);
            createZipPhotos(ligne, date)
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}

function removeApi(id_global, photo_name, elem, ligne, date) {
    $.ajax({

        url: $('.url_photos_api').text() + "_PA/remove-photo-pa",
        type: 'POST',
        async: false,
        data: "id_global=" + id_global + "&photo_name=" + photo_name,
        dataType: 'json',
        success: function (response, statut) {
            if (response == 1)
                alert('Erreur! Fichier photo supprimé mais la base n\'a pas été mise à jour!');
            else if (response == 2) {
                elem.parentNode.parentNode.remove();
                createZipPhotos(ligne, date);
            }
            else if (response == -1) alert('Erreur, photo non supprimée!');
            else alert('Erreur serveur, photo non supprimée!');
        },
        error: function (resultat, statut, erreur) {
            $('.loader').empty('.svg-loader');
            alert('Problème Serveur: ' + resultat);
        },
        complete: function (resultat, statut) {
            $('.loader').empty('.svg-loader');
        }
    });
}

function createZipPhotos(ligne, date) {

    $.ajax({

        url: $('.url_photos_api').text() + "_PA/generate-photo-zip-pa",
        type: 'POST',
        async: false,
        data: "ligne=" + ligne + "&date=" + date,
        dataType: 'json',
        success: function (response, statut) {
            if (response == true) {
                alert('Zip re-regénéré!');
            }
        },
        error: function (resultat, statut, erreur) {
            $('.loader').empty('.svg-loader');
            alert('Problème génération zip photos: ' + resultat);
        },
        complete: function (resultat, statut) {
            $('.loader').empty('.svg-loader');
        }
    });
}