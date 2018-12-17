
$(document).ready(function(){

	
	//Barres conformes
	var datasConformes = getDatasConformes( );
	var datasNC = getDatasNC( );
	var datasNO = getDatasNO( );

	//Init Tableau conformites-------------------------
	  var datasTabConformites = initDatasConformites( );
	  initTabConformites( datasTabConformites );

	startHighchart( datasConformes, datasNC, datasNO );

	function startHighchart( datasConformes, datasNC, datasNO ){

    // Build the chart
    $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#4682B4', '#8A2BE2', '#800080'],
            title: {
                text: 'Suivi des conformités de la vague en cours'
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
                name: 'Taux',
                colorByPoint: true,
                data: [{
                    name: 'Conformes',
                    y: datasConformes
                }, {
                    name: 'Non conformes',
                    y: datasNC,
                    sliced: true,
                    selected: true
                }, {
                    name: 'NO',
                    y: datasNO
                }]
            }]
        });
  }

});

function getDatasConformes( )
{
	var datas = [];

	$.ajax({

       	url : Routing.generate('bus_reporting_now_initconformes', true),
		type : 'POST',
		//data : "2016",
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

function getDatasNC( )
{
	var datas = [];

	$.ajax({

       	url : Routing.generate('bus_reporting_now_initnc', true),
		type : 'POST',
		//data : "2016",
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

function getDatasNO( )
{
	var datas = [];

	$.ajax({

       	url : Routing.generate('bus_reporting_now_initno', true),
		type : 'POST',
		//data : "2016",
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

function initDatasConformites( )
{
	var datas = [];

	$.ajax({

       	url : Routing.generate('bus_reporting_now_initabconformite', true),
		type : 'POST',
		//data : "2016",
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

function initTabConformites( datasTabConformites )
{
	 $('.biv_indice_conforme').text( datasTabConformites[0].biv_indice_infos.conforme );
	 $('.biv_indice_nc').text( datasTabConformites[0].biv_indice_infos.nc );
	 $('.biv_indice_NO').text( datasTabConformites[0].biv_indice_infos.no );

	 $('.biv_direction_conforme').text( datasTabConformites[0].biv_direction_infos.conforme );
	 $('.biv_direction_nc').text( datasTabConformites[0].biv_direction_infos.nc );
	 $('.biv_direction_NO').text( datasTabConformites[0].biv_direction_infos.no );

	 $('.biv_attente_conforme').text( datasTabConformites[0].biv_attente_infos.conforme );
	 $('.biv_attente_nc').text( datasTabConformites[0].biv_attente_infos.nc );
	 $('.biv_attente_NO').text( datasTabConformites[0].biv_attente_infos.no );

	 $('.MR_2_1_conforme').text( datasTabConformites[0].MR_2_1_infos.conforme );
	 $('.MR_2_1_nc').text( datasTabConformites[0].MR_2_1_infos.nc );
	 $('.MR_2_1_NO').text( datasTabConformites[0].MR_2_1_infos.no );

	 $('.MR_2_1_bis_conforme').text( datasTabConformites[0].MR_2_1_bis_infos.conforme );
	 $('.MR_2_1_bis_nc').text( datasTabConformites[0].MR_2_1_bis_infos.nc );
	 $('.MR_2_1_bis_NO').text( datasTabConformites[0].MR_2_1_bis_infos.no );

	 $('.Q_2_1_conforme').text( datasTabConformites[0].Q_2_1_infos.conforme );
	 $('.Q_2_1_nc').text( datasTabConformites[0].Q_2_1_infos.nc );
	 $('.Q_2_1_NO').text( datasTabConformites[0].Q_2_1_infos.no );

	 $('.Q_2_2_conforme').text( datasTabConformites[0].Q_2_2_infos.conforme );
	 $('.Q_2_2_nc').text( datasTabConformites[0].Q_2_2_infos.nc );
	 $('.Q_2_2_NO').text( datasTabConformites[0].Q_2_2_infos.no );

	 $('.Q_2_3_conforme').text( datasTabConformites[0].Q_2_3_infos.conforme );
	 $('.Q_2_3_nc').text( datasTabConformites[0].Q_2_3_infos.nc );
	 $('.Q_2_3_NO').text( datasTabConformites[0].Q_2_3_infos.no );

	 $('.Q_2_4_conforme').text( datasTabConformites[0].Q_2_4_infos.conforme );
	 $('.Q_2_4_nc').text( datasTabConformites[0].Q_2_4_infos.nc );
	 $('.Q_2_4_NO').text( datasTabConformites[0].Q_2_4_infos.no );

	 $('.Q_3_1_conforme').text( datasTabConformites[0].Q_3_1_infos.conforme );
	 $('.Q_3_1_nc').text( datasTabConformites[0].Q_3_1_infos.nc );
	 $('.Q_3_1_NO').text( datasTabConformites[0].Q_3_1_infos.no );

	 $('.Q_3_2_conforme').text( datasTabConformites[0].Q_3_2_infos.conforme );
	 $('.Q_3_2_nc').text( datasTabConformites[0].Q_3_2_infos.nc );
	 $('.Q_3_2_NO').text( datasTabConformites[0].Q_3_2_infos.no );

	 $('.Q_3_3_conforme').text( datasTabConformites[0].Q_3_3_infos.conforme );
	 $('.Q_3_3_nc').text( datasTabConformites[0].Q_3_3_infos.nc );
	 $('.Q_3_3_NO').text( datasTabConformites[0].Q_3_3_infos.no );

	 $('.Q_3_4_conforme').text( datasTabConformites[0].Q_3_4_infos.conforme );
	 $('.Q_3_4_nc').text( datasTabConformites[0].Q_3_4_infos.nc );
	 $('.Q_3_4_NO').text( datasTabConformites[0].Q_3_4_infos.no );

	 $('.Q_4_1_conforme').text( datasTabConformites[0].Q_4_1_infos.conforme );
	 $('.Q_4_1_nc').text( datasTabConformites[0].Q_4_1_infos.nc );
	 $('.Q_4_1_NO').text( datasTabConformites[0].Q_4_1_infos.no );

	 $('.Q_4_2_conforme').text( datasTabConformites[0].Q_4_2_infos.conforme );
	 $('.Q_4_2_nc').text( datasTabConformites[0].Q_4_2_infos.nc );
	 $('.Q_4_2_NO').text( datasTabConformites[0].Q_4_2_infos.no );

	 $('.Q_4_3_conforme').text( datasTabConformites[0].Q_4_3_infos.conforme );
	 $('.Q_4_3_nc').text( datasTabConformites[0].Q_4_3_infos.nc );
	 $('.Q_4_3_NO').text( datasTabConformites[0].Q_4_3_infos.no );

	 $('.Q_5_1_conforme').text( datasTabConformites[0].Q_5_1_infos.conforme );
	 $('.Q_5_1_nc').text( datasTabConformites[0].Q_5_1_infos.nc );
	 $('.Q_5_1_NO').text( datasTabConformites[0].Q_5_1_infos.no );

	 $('.Q_5_2_conforme').text( datasTabConformites[0].Q_5_2_infos.conforme );
	 $('.Q_5_2_nc').text( datasTabConformites[0].Q_5_2_infos.nc );
	 $('.Q_5_2_NO').text( datasTabConformites[0].Q_5_2_infos.no );

	 $('.Q_5_3_conforme').text( datasTabConformites[0].Q_5_3_infos.conforme );
	 $('.Q_5_3_nc').text( datasTabConformites[0].Q_5_3_infos.nc );
	 $('.Q_5_3_NO').text( datasTabConformites[0].Q_5_3_infos.no );

	 $('.Q_5_4_conforme').text( datasTabConformites[0].Q_5_4_infos.conforme );
	 $('.Q_5_4_nc').text( datasTabConformites[0].Q_5_4_infos.nc );
	 $('.Q_5_4_NO').text( datasTabConformites[0].Q_5_4_infos.no );

	 $('.Q_5_5_conforme').text( datasTabConformites[0].Q_5_5_infos.conforme );
	 $('.Q_5_5_nc').text( datasTabConformites[0].Q_5_5_infos.nc );
	 $('.Q_5_5_NO').text( datasTabConformites[0].Q_5_5_infos.no );

	 $('.Q_5_6_conforme').text( datasTabConformites[0].Q_5_6_infos.conforme );
	 $('.Q_5_6_nc').text( datasTabConformites[0].Q_5_6_infos.nc );
	 $('.Q_5_6_NO').text( datasTabConformites[0].Q_5_6_infos.no );

	 $('.Q_5_7_conforme').text( datasTabConformites[0].Q_5_7_infos.conforme );
	 $('.Q_5_7_nc').text( datasTabConformites[0].Q_5_7_infos.nc );
	 $('.Q_5_7_NO').text( datasTabConformites[0].Q_5_7_infos.no );

	 $('.Q_5_8_conforme').text( datasTabConformites[0].Q_5_8_infos.conforme );
	 $('.Q_5_8_nc').text( datasTabConformites[0].Q_5_8_infos.nc );
	 $('.Q_5_8_NO').text( datasTabConformites[0].Q_5_8_infos.no );

	 $('.Q_6_1_conforme').text( datasTabConformites[0].Q_6_1_infos.conforme );
	 $('.Q_6_1_nc').text( datasTabConformites[0].Q_6_1_infos.nc );
	 $('.Q_6_1_NO').text( datasTabConformites[0].Q_6_1_infos.no );

	 $('.Q_6_2_conforme').text( datasTabConformites[0].Q_6_2_infos.conforme );
	 $('.Q_6_2_nc').text( datasTabConformites[0].Q_6_2_infos.nc );
	 $('.Q_6_2_NO').text( datasTabConformites[0].Q_6_2_infos.no );

	 $('.Q_6_3_conforme').text( datasTabConformites[0].Q_6_3_infos.conforme );
	 $('.Q_6_3_nc').text( datasTabConformites[0].Q_6_3_infos.nc );
	 $('.Q_6_3_NO').text( datasTabConformites[0].Q_6_3_infos.no );

	 $('.Q_6_4_conforme').text( datasTabConformites[0].Q_6_4_infos.conforme );
	 $('.Q_6_4_nc').text( datasTabConformites[0].Q_6_4_infos.nc );
	 $('.Q_6_4_NO').text( datasTabConformites[0].Q_6_4_infos.no );

	 $('.Q_6_5_conforme').text( datasTabConformites[0].Q_6_5_infos.conforme );
	 $('.Q_6_5_nc').text( datasTabConformites[0].Q_6_5_infos.nc );
	 $('.Q_6_5_NO').text( datasTabConformites[0].Q_6_5_infos.no );

	 $('.Q_6_6_conforme').text( datasTabConformites[0].Q_6_6_infos.conforme );
	 $('.Q_6_6_nc').text( datasTabConformites[0].Q_6_6_infos.nc );
	 $('.Q_6_6_NO').text( datasTabConformites[0].Q_6_6_infos.no );

	 $('.Q_6_7_conforme').text( datasTabConformites[0].Q_6_7_infos.conforme );
	 $('.Q_6_7_nc').text( datasTabConformites[0].Q_6_7_infos.nc );
	 $('.Q_6_7_NO').text( datasTabConformites[0].Q_6_7_infos.no );

	 $('.Q_6_8_conforme').text( datasTabConformites[0].Q_6_8_infos.conforme );
	 $('.Q_6_8_nc').text( datasTabConformites[0].Q_6_8_infos.nc );
	 $('.Q_6_8_NO').text( datasTabConformites[0].Q_6_8_infos.no );

	 $('.Q_6_9_conforme').text( datasTabConformites[0].Q_6_9_infos.conforme );
	 $('.Q_6_9_nc').text( datasTabConformites[0].Q_6_9_infos.nc );
	 $('.Q_6_9_NO').text( datasTabConformites[0].Q_6_9_infos.no );

	 $('.Q_6_10_conforme').text( datasTabConformites[0].Q_6_10_infos.conforme );
	 $('.Q_6_10_nc').text( datasTabConformites[0].Q_6_10_infos.nc );
	 $('.Q_6_10_NO').text( datasTabConformites[0].Q_6_10_infos.no );

	 $('.Q_6_11_conforme').text( datasTabConformites[0].Q_6_11_infos.conforme );
	 $('.Q_6_11_nc').text( datasTabConformites[0].Q_6_11_infos.nc );
	 $('.Q_6_11_NO').text( datasTabConformites[0].Q_6_11_infos.no );

	 $('.Q_6_12_conforme').text( datasTabConformites[0].Q_6_12_infos.conforme );
	 $('.Q_6_12_nc').text( datasTabConformites[0].Q_6_12_infos.nc );
	 $('.Q_6_12_NO').text( datasTabConformites[0].Q_6_12_infos.no );

	 $('.Q_6_13_conforme').text( datasTabConformites[0].Q_6_13_infos.conforme );
	 $('.Q_6_13_nc').text( datasTabConformites[0].Q_6_13_infos.nc );
	 $('.Q_6_13_NO').text( datasTabConformites[0].Q_6_13_infos.no );

	 $('.Q_6_14_conforme').text( datasTabConformites[0].Q_6_14_infos.conforme );
	 $('.Q_6_14_nc').text( datasTabConformites[0].Q_6_14_infos.nc );
	 $('.Q_6_14_NO').text( datasTabConformites[0].Q_6_14_infos.no );

	 $('.Q_7_1_conforme').text( datasTabConformites[0].Q_7_1_infos.conforme );
	 $('.Q_7_1_nc').text( datasTabConformites[0].Q_7_1_infos.nc );
	 $('.Q_7_1_NO').text( datasTabConformites[0].Q_7_1_infos.no );

	 $('.MR_3_1_conforme').text( datasTabConformites[0].MR_3_1_infos.conforme );
	 $('.MR_3_1_nc').text( datasTabConformites[0].MR_3_1_infos.nc );
	 $('.MR_3_1_NO').text( datasTabConformites[0].MR_3_1_infos.no );

	 $('.MR_3_2_conforme').text( datasTabConformites[0].MR_3_2_infos.conforme );
	 $('.MR_3_2_nc').text( datasTabConformites[0].MR_3_2_infos.nc );
	 $('.MR_3_2_NO').text( datasTabConformites[0].MR_3_2_infos.no );

	 $('.MR_4_1_conforme').text( datasTabConformites[0].MR_4_1_infos.conforme );
	 $('.MR_4_1_nc').text( datasTabConformites[0].MR_4_1_infos.nc );
	 $('.MR_4_1_NO').text( datasTabConformites[0].MR_4_1_infos.no );

	 $('.MR_4_2_conforme').text( datasTabConformites[0].MR_4_2_infos.conforme );
	 $('.MR_4_2_nc').text( datasTabConformites[0].MR_4_2_infos.nc );
	 $('.MR_4_2_NO').text( datasTabConformites[0].MR_4_2_infos.no );

	 $('.MR_5_1_conforme').text( datasTabConformites[0].MR_5_1_infos.conforme );
	 $('.MR_5_1_nc').text( datasTabConformites[0].MR_5_1_infos.nc );
	 $('.MR_5_1_NO').text( datasTabConformites[0].MR_5_1_infos.no );

	 $('.MR_5_2_conforme').text( datasTabConformites[0].MR_5_2_infos.conforme );
	 $('.MR_5_2_nc').text( datasTabConformites[0].MR_5_2_infos.nc );
	 $('.MR_5_2_NO').text( datasTabConformites[0].MR_5_2_infos.no );

	 $('.MR_5_3_conforme').text( datasTabConformites[0].MR_5_3_infos.conforme );
	 $('.MR_5_3_nc').text( datasTabConformites[0].MR_5_3_infos.nc );
	 $('.MR_5_3_NO').text( datasTabConformites[0].MR_5_3_infos.no );

	 $('.MR_5_4_conforme').text( datasTabConformites[0].MR_5_4_infos.conforme );
	 $('.MR_5_4_nc').text( datasTabConformites[0].MR_5_4_infos.nc );
	 $('.MR_5_4_NO').text( datasTabConformites[0].MR_5_4_infos.no );

	 $('.MR_5_5_conforme').text( datasTabConformites[0].MR_5_5_infos.conforme );
	 $('.MR_5_5_nc').text( datasTabConformites[0].MR_5_5_infos.nc );
	 $('.MR_5_5_NO').text( datasTabConformites[0].MR_5_5_infos.no );

	 $('.MR_6_1_conforme').text( datasTabConformites[0].MR_6_1_infos.conforme );
	 $('.MR_6_1_nc').text( datasTabConformites[0].MR_6_1_infos.nc );
	 $('.MR_6_1_NO').text( datasTabConformites[0].MR_6_1_infos.no );

	 $('.MR_6_2_conforme').text( datasTabConformites[0].MR_6_2_infos.conforme );
	 $('.MR_6_2_nc').text( datasTabConformites[0].MR_6_2_infos.nc );
	 $('.MR_6_2_NO').text( datasTabConformites[0].MR_6_2_infos.no );

	 $('.MR_6_3_conforme').text( datasTabConformites[0].MR_6_3_infos.conforme );
	 $('.MR_6_3_nc').text( datasTabConformites[0].MR_6_3_infos.nc );
	 $('.MR_6_3_NO').text( datasTabConformites[0].MR_6_3_infos.no );

	 $('.MR_6_4_conforme').text( datasTabConformites[0].MR_6_4_infos.conforme );
	 $('.MR_6_4_nc').text( datasTabConformites[0].MR_6_4_infos.nc );
	 $('.MR_6_4_NO').text( datasTabConformites[0].MR_6_4_infos.no );

	 $('.MR_7_1_conforme').text( datasTabConformites[0].MR_7_1_infos.conforme );
	 $('.MR_7_1_nc').text( datasTabConformites[0].MR_7_1_infos.nc );
	 $('.MR_7_1_NO').text( datasTabConformites[0].MR_7_1_infos.no );

	 $('.MR_7_2_conforme').text( datasTabConformites[0].MR_7_2_infos.conforme );
	 $('.MR_7_2_nc').text( datasTabConformites[0].MR_7_2_infos.nc );
	 $('.MR_7_2_NO').text( datasTabConformites[0].MR_7_2_infos.no );

	 $('.MR_7_3_conforme').text( datasTabConformites[0].MR_7_3_infos.conforme );
	 $('.MR_7_3_nc').text( datasTabConformites[0].MR_7_3_infos.nc );
	 $('.MR_7_3_NO').text( datasTabConformites[0].MR_7_3_infos.no );

	 $('.MR_7_4_conforme').text( datasTabConformites[0].MR_7_4_infos.conforme );
	 $('.MR_7_4_nc').text( datasTabConformites[0].MR_7_4_infos.nc );
	 $('.MR_7_4_NO').text( datasTabConformites[0].MR_7_4_infos.no );

	 $('.MR_7_5_conforme').text( datasTabConformites[0].MR_7_5_infos.conforme );
	 $('.MR_7_5_nc').text( datasTabConformites[0].MR_7_5_infos.nc );
	 $('.MR_7_5_NO').text( datasTabConformites[0].MR_7_5_infos.no );

	 $('.MR_7_6_conforme').text( datasTabConformites[0].MR_7_6_infos.conforme );
	 $('.MR_7_6_nc').text( datasTabConformites[0].MR_7_6_infos.nc );
	 $('.MR_7_6_NO').text( datasTabConformites[0].MR_7_6_infos.no );

	 $('.MR_7_7_conforme').text( datasTabConformites[0].MR_7_7_infos.conforme );
	 $('.MR_7_7_nc').text( datasTabConformites[0].MR_7_7_infos.nc );
	 $('.MR_7_7_NO').text( datasTabConformites[0].MR_7_7_infos.no );
}