$(document).ready(function(){
    $('.mois_info, .table_info').hide();

    $('.view').click(function(){
        window.location.href = Routing.generate('pa_photo_import', {id: $('.id').text(),
                                                table: $('.table_info').text(), mois: $('.mois_info').text()});
    });
    $('.fiche-list').click(function(){
        window.location.href = Routing.generate('pa_questionnaire_all', {mois: $('.mois_info').text()} );
    });

    $('.init_Q_1_1').change(function(){
        $('.Q_1_1').val( $(this).val() );
    });
    $('.init_Q_1_2').change(function(){
        $('.Q_1_2').val( $(this).val() );
    });
    $('.init_Q_1_3').change(function(){
        $('.Q_1_3').val( $(this).val() );
    });
    $('.init_Q_1_4').change(function(){
        $('.Q_1_4').val( $(this).val() );
    });
    $('.init_Q_2_1').change(function(){
        $('.Q_2_1').val( $(this).val() );
    });
    $('.init_Q_2_2').change(function(){
        $('.Q_2_2').val( $(this).val() );
    });
    $('.init_Q_2_3').change(function(){
        $('.Q_2_3').val( $(this).val() );
    });
    $('.init_Q_2_4').change(function(){
        $('.Q_2_4').val( $(this).val() );
    });
    $('.init_Q_2_5').change(function(){
        $('.Q_2_5').val( $(this).val() );
    });
    $('.init_Q_3_1').change(function(){
        $('.Q_3_1').val( $(this).val() );
    });
    $('.init_Q_3_2').change(function(){
        $('.Q_3_2').val( $(this).val() );
    });
    $('.init_Q_3_3').change(function(){
        $('.Q_3_3').val( $(this).val() );
    });
    $('.init_Q_3_4').change(function(){
        $('.Q_3_4').val( $(this).val() );
    });
    $('.init_Q_3_5').change(function(){
        $('.Q_3_5').val( $(this).val() );
    });
    $('.init_Q_4_1').change(function(){
        $('.Q_4_1').val( $(this).val() );
    });
    $('.init_Q_4_2').change(function(){
        $('.Q_4_2').val( $(this).val() );
    });
    $('.init_Q_4_3').change(function(){
        $('.Q_4_3').val( $(this).val() );
    });
    $('.init_Q_4_4').change(function(){
        $('.Q_4_4').val( $(this).val() );
    });
    $('.init_Q_4_5').change(function(){
        $('.Q_4_5').val( $(this).val() );
    });
    $('.init_Q_4_6').change(function(){
        $('.Q_4_6').val( $(this).val() );
    });
    $('.init_Q_4_7').change(function(){
        $('.Q_4_7').val( $(this).val() );
    });
    $('.init_Q_4_8').change(function(){
        $('.Q_4_8').val( $(this).val() );
    });
    $('.init_Q_4_9').change(function(){
        $('.Q_4_9').val( $(this).val() );
    });

    $('.json-export').click(function(){
      jsonExport();
    });

  $('.back').click(function () {
    window.location.href = Routing.generate('pa_questionnaire_all', { mois: $('.mois').text() });
  });


});

function jsonExport()
{
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
    $('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');

    $.ajax({

      url : Routing.generate('pa_json_generate_one', true),
      type : 'POST',
      async: false, 
      data: {id: $('.id').text(), date: $('.date').text()},
      dataType : 'json',
      success : function(response, statut){
        if(response == true)
        {
          setJsonStatut( $('.id').text());
          alert('JSON généré!');
          $('.loader').empty('.svg-loader');
        }
      },
      error : function(resultat, statut, erreur){
        alert('Problème, JSON non généré!');
        $('.loader').empty('.svg-loader');
      },
      complete : function(resultat, statut){
        $('.loader').empty('.svg-loader');
      }
    });
}

function setJsonStatut( id )
{
    $.ajax({

      url : Routing.generate('pa_json_set_statut_one', true),
      type : 'POST',
      async: false, 
      data: {id: $('.id').text(), statut: 1},
      dataType : 'json',
      success : function(response, statut){
        $('.json-statut').text('Exporté!');
        $('.json-statut').attr('class', 'text-success');
      },
      error : function(resultat, statut, erreur){
        console.log('ERREUR: '+erreur);
      },
      complete : function(resultat, statut){
        
      }
    });
}