$(document).ready(function(){
    $('.generate-json').click(function(){
        var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
        $('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');

        var ligne = $(this).parent().next('td').find('.ligne').text();
        var date = $(this).parent().next('td').next('td').find('.date').text();
        setTimeout(generateJson(ligne, date), 1000);
    });

    $('.submit').click(function(){
        window.location.href = Routing.generate('pa_json_re_export_home', { 'ligne': $('.ligne').val() });
    });

    $('.ok').click(function(){ 
      var radio = $('input[name='+$(this).prop("id")+']:checked').val();
      var data_html = $(this).prop("id");
      var data = data_html.split('-');
      var date = data[1];
      var zone = data[0];

      reSetJSON( zone, radio, date );
    });
});

function reSetJSON( zone, value, date )
{
    $.ajax({

      url : Routing.generate('pa_json_re_export_update', true),
      type : 'POST',
      async: false, 
      data: {zone: zone, value: value, date: date},
      dataType : 'json',
      success : function(response, statut){
        alert('Enregistrement effectué!')
      },
      error : function(resultat, statut, erreur){
        alert('Problème enregistrement!');
      },
      complete : function(resultat, statut){
        
      }
    });
}

function generateJson( ligne, date )
{
    $.ajax({

      url : Routing.generate('pa_json_generate_by_line_date', true),
      type : 'POST',
      async: false, 
      data: { ligne: ligne, date: date },
      dataType : 'json',
      success : function(response, statut){
        if( response==true )
        {
            alert('Exporté!');
            setJsonStatut( ligne, date );
        }
      },
      error : function(resultat, statut, erreur){
          $('.loader').empty('.svg-loader');
          alert('Problème export!');
      },
      complete : function(resultat, statut){
          $('.loader').empty('.svg-loader');
      }
    });
}

function setJsonStatut( ligne, date )
{
    $.ajax({

      url : Routing.generate('pa_json_by_line_date_set_statut_one', true),
      type : 'POST',
      async: false, 
      data: { ligne: ligne, date: date, statut: 1 },
      //dataType : 'json',
      success : function(response, statut){
          window.location.reload();
      },
      error : function(resultat, statut, erreur){
        console.log('ERREUR: '+erreur);
      },
      complete : function(resultat, statut){
        
      }
    });
}