$(document).ready(function() {

  $('.mois_info, .table_info').hide();

//-----FILTER ENQUETEUR----------------
  $('.enq_select').change(function(){
    var value = $(this).val();
    if( value!="-" )
      window.location.href = Routing.generate('pa_questionnaire_all_by_filter', { typeFilter: 'enqueteur', dataFilter: $(this).val(),
                                          table: $('.table_info').text(), mois: $('.mois_info').text() });
  });
//-----FILTER LIGNE----------------
  $('.ligne_select').change(function(){
    var value = $(this).val();
    if( value!="-" )
      window.location.href = Routing.generate('pa_questionnaire_all_by_filter', { typeFilter: 'ligne', dataFilter: $(this).val(),
                table: $('.table_info').text(), mois: $('.mois_info').text() });
  });
  //-----FILTER ZONE----------------
  $('.zone_select').change(function(){
    var value = $(this).val();
    if( value!="-" )
      window.location.href = Routing.generate('pa_questionnaire_all_by_filter', { typeFilter: 'zone', dataFilter: $(this).val(),
            table: $('.table_info').text(), mois: $('.mois_info').text() });
  });
  //-----FILTER DATE----------------
  $('.date_select').change(function(){
    var value = $(this).val();
    if( value!="-" )
      window.location.href = Routing.generate('pa_questionnaire_all_by_filter', { typeFilter: 'date', dataFilter: $(this).val(),
              table: $('.table_info').text(), mois: $('.mois_info').text() });
  });

  $('.btn-gipa').click(function(){
    var value = $('.input-gipa').val();
    if( value!="" )
      window.location.href = Routing.generate('pa_questionnaire_all_by_filter', { typeFilter: 'gipa', dataFilter: value,
              table: $('.table_info').text(), mois: $('.mois_info').text() });
  });

  $('.export').click(function(){
    exportMesures();
  });
  

  $('.saisies_saved').click(function(){
    if( $(this).is(':checked') ) $('.valid_1').show();
    else $('.valid_1').hide();
  });

  $('.saisies_to_pdate').click(function(){
    if( $(this).is(':checked') ) $('.valid_0').show();
    else $('.valid_0').hide();
  });

  $('.history').change(function(){
    window.location.href = Routing.generate('pa_questionnaire_all', { 'mois': $(this).val() });
  });

//Barres conformes
  var infosMesures = getInfosMesures( );
  var nbValides = parseInt( infosMesures[0].totalValides[0].valide );
  var nbTotal = parseInt( infosMesures[0].totalMesures[0].total );
  var nbEnAttente = nbTotal - nbValides;


setTimeout(startHighchart( nbValides, nbEnAttente, nbTotal ), 10000)

function startHighchart( nbValides, nbEnAttente, nbTotal ){

    // Build the chart
    $('#container').highcharts({
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        marginTop: -40
      },
      title: {
        text: 'Nombre de mesures: '+nbTotal.toString(),
        y:5,
        floating: true
      },
      legend: {
        verticalAlign: "bottom"
      },
      exporting: {
        enabled: false
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: false
          },
          showInLegend: true
        }
      },
      series: [{
        name: 'Saisies',
        colorByPoint: true,
        data: [{
          name: 'Validées',
          y: nbValides,
          color: "#9370DB"
        }, {
          name: 'En attente',
          y: nbEnAttente,
          sliced: true,
          selected: true,
          color: "#8A2BE2"
        }]
      }]
    });
  }

  });

function exportMesures( )
{
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
    $('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');

  $.ajax({

      url : Routing.generate('pa_questionnaire_all_export', true),
      type : 'POST',
      async: false, 
      dataType : 'json',
      success : function(response, statut){
        window.location.href = base_url+'export_public/MESURES_PA.xlsx';
	      $('.loader').empty('.svg-loader');
      },
      error : function(resultat, statut, erreur){
            alert('Problème export!');
            $('.loader').empty('.svg-loader');
      },
      complete : function(resultat, statut){
        $('.loader').empty('.svg-loader');
      }
  });
}

function getInfosMesures( )
{
  var datas = [];

  $.ajax({

        url : Routing.generate('pa_questionnaire_quotas_mesures_valides', true),
    type : 'POST',
    async: false, 
    dataType : 'json',
    success : function(response, statut){
      datas = response;
    },
    error : function(resultat, statut, erreur){
    },
    complete : function(resultat, statut){
      
    }
  });
  return datas;
}

