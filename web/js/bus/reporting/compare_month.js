var compare_first;
var compare_second;
var mois_list = new Array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
 'Novembre', 'Décembre');

$(document).ready(function(){

	$('.init_mois_a, .init_mois_b, .init_annee_a, .init_annee_b').hide();
	
	$('.start').click(function(){

		var mois_a = $('.mois_a').val();
		var annee_a = $('.annee_a').val();
		var mois_b = $('.mois_b').val();
		var annee_b = $('.annee_b').val();

		var periode_a = mois_a +'_'+annee_a;
		var periode_b = mois_b +'_'+annee_b;

		window.location.href = Routing.generate('bus_reporting_compare_month', {'periode_a': periode_a, 'periode_b': periode_b});
	});

if( $('.init_mois_a').text() != "" )
	initSelects();

});

function initSelects()
{
	var mois_a = $('.init_mois_a').text();
	var mois_b = $('.init_mois_b').text();
	var annee_a = $('.init_annee_a').text();
	var annee_b = $('.init_annee_a').text();
	
	if( mois_a != '' )
		$('.mois_a').val( mois_a.trim() );
	if( mois_b != '' )
		$('.mois_b').val( mois_b.trim() );
	if( annee_a != '' )
		$('.annee_a').val( annee_a.trim() );
	if( annee_b != '' )
		$('.annee_b').val( annee_b.trim() );

	compare_first_label = mois_list[ mois_a.trim() ]+' '+annee_a.trim();
	compare_second_label = mois_list[ mois_b.trim() ]+' '+annee_b.trim();

	var array_datas_first = getDatas( mois_a.trim()+'_'+annee_a.trim() );
	var array_datas_second = getDatas( mois_b.trim()+'_'+annee_b.trim() );
	var set_datas = setDatas( compare_first_label, compare_second_label, array_datas_first, array_datas_second );

	var ctx = document.getElementById("myChart");
	var ctx = document.getElementById("myChart").getContext("2d");
	var ctx = $("#myChart");

	startChart( ctx, set_datas );
	setTabConformes( array_datas_first, array_datas_second );
}

function setTabConformes( array_datas_first, array_datas_second )
{
	$('.biv_indice_A').text( array_datas_first[0].data );
	$('.biv_direction_A').text( array_datas_first[1].data );
	$('.biv_attente_A').text( array_datas_first[2].data );
	$('.Q_2_A').text( array_datas_first[3].data );
	$('.Q_3_A').text( array_datas_first[4].data );
	$('.Q_4_A').text( array_datas_first[5].data );
	$('.Q_5_A').text( array_datas_first[6].data );
	$('.Q_6_A').text( array_datas_first[7].data );
	$('.Q_7_A').text( array_datas_first[8].data );
	$('.MR_2_A').text( array_datas_first[9].data );
	$('.MR_2_bis_A').text( array_datas_first[10].data );
	$('.MR_3_A').text( array_datas_first[11].data );
	$('.MR_4_A').text( array_datas_first[12].data );
	$('.MR_5_A').text( array_datas_first[13].data );
	$('.MR_6_A').text( array_datas_first[14].data );
	$('.MR_7_A').text( array_datas_first[15].data );

	$('.biv_indice_B').text( array_datas_second[0].data );
	$('.biv_direction_B').text( array_datas_second[1].data );
	$('.biv_attente_B').text( array_datas_second[2].data );
	$('.Q_2_B').text( array_datas_second[3].data );
	$('.Q_3_B').text( array_datas_second[4].data );
	$('.Q_4_B').text( array_datas_second[5].data );
	$('.Q_5_B').text( array_datas_second[6].data );
	$('.Q_6_B').text( array_datas_second[7].data );
	$('.Q_7_B').text( array_datas_second[8].data );
	$('.MR_2_B').text( array_datas_first[9].data );
	$('.MR_2_bis_B').text( array_datas_first[10].data );
	$('.MR_3_B').text( array_datas_first[11].data );
	$('.MR_4_B').text( array_datas_first[12].data );
	$('.MR_5_B').text( array_datas_first[13].data );
	$('.MR_6_B').text( array_datas_first[14].data );
	$('.MR_7_B').text( array_datas_first[15].data );
}

function startChart( ctx, data )
{
	var myRadarChart = new Chart(ctx, {
    type: 'radar',
    data: data,
    options: {
            scale: {
                //reverse: true,
                ticks: {
                    beginAtZero: true
                }
            }
    }
	});

}

function setDatas( compare_first_label, compare_second_label, array_datas_first, array_datas_second )
{
	var listLabelsPeriodeA = new Array();
	var listResultsPeriodeA = new Array();
	for( var i=0; i<array_datas_first.length; i++ )
	{
		listLabelsPeriodeA.push( array_datas_first[i].label );
		listResultsPeriodeA.push( array_datas_first[i].data );
	}


	var listResultsPeriodeB = new Array();
	for( var i=0; i<array_datas_second.length; i++ )
	{
		listResultsPeriodeB.push( array_datas_second[i].data );
	}
	

	var data = {
    labels: listLabelsPeriodeA,
    datasets: [
        {
            label: compare_first_label.toString(),
            backgroundColor: "rgba(179,181,198,0.2)",
            borderColor: "rgba(179,181,198,1)",
            pointBackgroundColor: "rgba(179,181,198,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(179,181,198,1)",
            data: listResultsPeriodeA
        },
        {
            label: compare_second_label.toString(),
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            pointBackgroundColor: "rgba(255,99,132,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(255,99,132,1)",
            data: listResultsPeriodeB
        }
    ]
	};
	return data;
}

function getDatas( vague )
{
	var datas = [];

	$.ajax({

       	url : Routing.generate('bus_reporting_compare_month_init_graph', true),
		type : 'POST',
		data : { 'period':vague },
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
