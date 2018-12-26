$(document).ready(function () {
  $('.generate-json').prop('disabled', true);

  $('.generate-zip-file').click(function () {
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi, '');
    $('.loader').append('<img src="' + base_url + '/images/gears.svg" class="svg-loader" />');

    var ligne = $(this).parent().next('td').find('.ligne').text();
    var date = $(this).parent().next('td').next('td').find('.date').text();

    // setTimeout(createZipPhotos($(this), ligne, date), 1000);
  });

  $('.generate-json').click(function () {
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi, '');
    $('.loader').append('<img src="' + base_url + '/images/gears.svg" class="svg-loader" />');

    var ligne = $(this).parent().next('td').find('.ligne').text();
    var date = $(this).parent().next('td').next('td').find('.date').text();
    setTimeout(generateJson(ligne, date), 1000);
    $('.close-alert').click(function () {
      $('.alert-content').empty();
    });
  });

  $('.submit').click(function () {
    window.location.href = Routing.generate('bus_json_re_export_home', { 'ligne': $('.ligne').val() });
  });

  $('.ok').click(function () {
    var radio = $('input[name=' + $(this).prop("id") + ']:checked').val();

    reSetJSON($(this).prop("id"), radio);
  });
});

function createZipPhotos(elem, ligne, date) {

  $.ajax({

    url: $('.url_photos_api').text() + "/generate-photo-zip-bus",
    type: 'POST',
    async: false,
    data: "ligne=" + ligne + "&date=" + date,
    dataType: 'json',
    success: function (response, statut) {
      if (response == true) {
        alert('Zip photos généré!');
        elem.parent().find('.generate-json').prop('disabled', false);
        elem.removeClass('btn-warning').addClass('btn-success');
        elem.parent().find('.report-zip-file').removeClass('hide').addClass('show-this');
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

function reSetJSON(id, value) {
  $.ajax({

    url: Routing.generate('bus_json_re_export_update', true),
    type: 'POST',
    async: false,
    data: { id: id, value: value },
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

    url: Routing.generate('bus_json_generate_by_line_date', true),
    type: 'POST',
    async: false,
    data: { ligne: ligne, date: date },
    dataType: 'json',
    success: function (response, statut) {
      //setJsonStatut( ligne, date );
      window.location.reload();
    },
    error: function (resultat, statut, erreur) {
      $('.loader').empty('.svg-loader');
      alert('Problème export!');
      $.ajax({

        url: Routing.generate('bus_json_get_error_log', true),
        type: 'POST',
        async: false,
        //data: {ligne: ligne, date: date},
        dataType: 'json',
        success: function (response, statut) {

          var id_global = response.id_global;
          var montee = response.montee;
          var direction = response.direction;
          var message = response.message;
          setAlertHTML(id_global, montee, direction, message, ligne);

        },
        error: function (resultat, statut, erreur) { },
        complete: function (resultat, statut) { }
      });
    },
    complete: function (resultat, statut) {

      $('.loader').empty('.svg-loader');
    }
  });
}

function setJsonStatut(ligne, date) {
  $.ajax({

    url: Routing.generate('bus_json_by_line_date_set_statut_one', true),
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

function setAlertHTML(id_global, montee, direction, message, ligne) {
  var text = ['<div class="alert alert-danger alert-dismissable" role="alert">',
    '<button class="btn btn-xs text-alert close-alert">Fermer la fenêtre</button>',
    '<h2>Informations des erreurs d\'export pour la ligne ' + ligne + '</h2>',
    '<div><strong>Montée: </strong>' + montee + '</div>',
    '<div><strong>Direction: </strong>' + direction + '</div>',
    '<div><strong>Message: </strong>' + message + '</div>',
    '<div><strong>La montée et/ou la direction saisie(s) ne coïncide(nt) pas avec le fichier global!</strong></div>',
    '</div>'].join('\n');


  $('.alert-content').append(text);
}

function viewReport(ligne, date) {
  window.open(Routing.generate('pa_zip_report', { ligne: ligne, date: date }, true), "_blank");
}