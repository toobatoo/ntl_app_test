$(document).ready(function () {
    $('.generate-json').prop('disabled', true);

    $('.generate-zip-file').click(function () {
        var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi, '');
        $('.loader').append('<img src="' + base_url + '/images/gears.svg" class="svg-loader" />');

        var ligne = $(this).parent().next('td').find('.ligne').text();
        var date = $(this).parent().next('td').next('td').find('.date').text();
        alert(base_url);
        setTimeout(createZipPhotos($(this), ligne, date), 1000);
    });

    $('.generate-json').click(function () {
        var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi, '');
        $('.loader').append('<img src="' + base_url + '/images/gears.svg" class="svg-loader" />');

        var ligne = $(this).parent().next('td').find('.ligne').text();
        var date = $(this).parent().next('td').next('td').find('.date').text();
        setTimeout(generateJson(ligne, date), 1000);
    });

    $('.submit').click(function () {
        window.location.href = Routing.generate('pa_json_re_export_home', { 'ligne': $('.ligne').val() });
    });

    $('.ok').click(function () {
        var radio = $('input[name=' + $(this).prop("id") + ']:checked').val();
        var data_html = $(this).prop("id");
        var data = data_html.split('-');
        var date = data[1];
        var zone = data[0];

        reSetJSON(zone, radio, date);
    });
});

function createZipPhotos(elem, ligne, date) {

    $.ajax({

        url: $('.url_photos_api').text() + "_PA/generate-photo-zip-pa",
        type: 'POST',
        async: false,
        data: "ligne=" + ligne + "&date=" + date,
        dataType: 'json',
        success: function (response, statut) {
            if (response == 2) {
                alert('Zip photos généré!');
                elem.parent().find('.generate-json').prop('disabled', false);
                elem.removeClass('btn-warning').addClass('btn-success');
                elem.parent().find('.report-zip-file').removeClass('hide').addClass('show-this');
            }
            else if (response == 1) alert('Erreur: copie ok, mais zip non généré!');
            else alert('Erreur!');
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

function reSetJSON(zone, value, date) {
    $.ajax({

        url: Routing.generate('pa_json_re_export_update', true),
        type: 'POST',
        async: false,
        data: { zone: zone, value: value, date: date },
        dataType: 'json',
        success: function (response, statut) {
            alert('Enregistrement effectué!')
        },
        error: function (resultat, statut, erreur) {
            alert('Problème enregistrement!');
        },
        complete: function (resultat, statut) {

        }
    });
}

function generateJson(ligne, date) {
    $.ajax({

        url: Routing.generate('pa_json_generate_by_line_date', true),
        type: 'POST',
        async: false,
        data: { ligne: ligne, date: date },
        dataType: 'json',
        success: function (response, statut) {
            if (response == true) {
                alert('Exporté!');
                copyZipFile(ligne, date);
            }
        },
        error: function (resultat, statut, erreur) {
            $('.loader').empty('.svg-loader');
            alert('Problème export!');
        },
        complete: function (resultat, statut) {
            $('.loader').empty('.svg-loader');
        }
    });
}

function copyZipFile(ligne, date) {
    $.ajax({

        url: $('.url_photos_api').text() + "_PA/copy-zip-pa",
        type: 'POST',
        async: false,
        data: { ligne: ligne, date: date },
        dataType: 'json',
        success: function (response, statut) {
            if (response == true)
                setJsonStatut(ligne, date);
            else alert('JSON exporté, mais zip photo non copié vers répertoire client!');
        },
        error: function (resultat, statut, erreur) {
            $('.loader').empty('.svg-loader');
            alert('JSON exporté, mais zip photo non copié vers répertoire client!');
        },
        complete: function (resultat, statut) {
            $('.loader').empty('.svg-loader');
        }
    });
}

function setJsonStatut(ligne, date) {
    $.ajax({

        url: Routing.generate('pa_json_by_line_date_set_statut_one', true),
        type: 'POST',
        async: false,
        data: { ligne: ligne, date: date, statut: 1 },
        //dataType : 'json',
        success: function (response, statut) {
            window.location.reload();
        },
        error: function (resultat, statut, erreur) {
            console.log('ERREUR: ' + erreur);
        },
        complete: function (resultat, statut) {

        }
    });
}

function viewReport(ligne, date) {
    window.open(Routing.generate('pa_zip_report', { ligne: ligne, date: date }, true), "_blank");
}