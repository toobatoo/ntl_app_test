
$(document).ready(function(){

	
	//Barres conformes
	var datasConformes = getDatasConformes( );
	var datas_mois_to_init_chart = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

	for( var i=0; i<datasConformes.length; i++ )
	{
		var datas_decompose_mois = datasConformes[i].mois.split('_');
		var mois = datas_decompose_mois[0];
		var conforme = datasConformes[i].conforme;
		datas_mois_to_init_chart[ mois -1 ] = conforme;
	}

	//Lignes-points NC
	var datasNC = getDatasNC( );
	var datas_NC_to_init_chart = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

	for( var i=0; i<datasNC.length; i++ )
	{
		var datas_decompose_NC = datasNC[i].mois.split('_');
		var mois = datas_decompose_NC[0];
		var nc = datasNC[i].nc;
		datas_NC_to_init_chart[ mois -1 ] = nc;
	}
        
	startHighchart( datas_mois_to_init_chart, datas_NC_to_init_chart );

	function startHighchart( datas_mois_to_init_chart, datas_NC_to_init_chart ){

    // Build the chart
    $('#container').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Evolutions des nc sur l\'année'
        },
        subtitle: {
            text: 'Sources: Objectif Terrain'
        },
        xAxis: [{
            categories: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jui',
                'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Déc'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} nc',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: 'Conformes',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Non conformes',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} c',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: 'Conformes',
            type: 'column',
            yAxis: 1,
            //data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
            data: datas_mois_to_init_chart,
            tooltip: {
                valueSuffix: ' c'
            }

        }, {
            name: 'Non conformes',
            type: 'spline',
            //data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
            data: datas_NC_to_init_chart,
            tooltip: {
                valueSuffix: ' nc'
            }
        }]
    });
  }
});

function getDatasConformes( )
{
	var datas = [];

	$.ajax({

       	url : Routing.generate('bus_reporting_year_initconformes', true),
		type : 'POST',
		data : "2016",
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

       	url : Routing.generate('bus_reporting_year_initnc', true),
		type : 'POST',
		data : "2016",
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