$(document).ready(function(){
    //------Calcul pénalités
    var fact_min = 0;
    var fact_maj = 0;
    
    $('.fact_min').each(function(){
        if( $(this).text() != '' )fact_min += ($(this).text() * 5);
    });
    $('.fact_maj').each(function(){
        if( $(this).text() != '' )fact_maj += ($(this).text() * 10);
    });

    var fact_total = fact_min + fact_maj;
    $('.somme_penalites').text( fact_total +'€' );

    //------Recherche par sélection
    $('.glyphicon-play-circle').click(function(){
        var year = $('.year').val();
        var month = $('.month').val();
        
        var month_format = getMonth( month );
        window.location.href = Routing.generate('app_dysfonctionnement', {year_to_show: year, 
                month_to_show: month_format});
    });

    $('.add').click(function(){
        var year = $('.year').val();
        var month = $('.month').val();
        
        var month_format = getMonth( month );
        window.location.href = Routing.generate('app_dysfonctionnement_add_page', {year_to_show: year, 
                month_to_show: month_format});
    });

    $('.export').click(function(){
        var year = $('.year').val();
        var month = $('.month').val();
        
        var month_format = getMonth( month );
        exportDysfonctionnements( year, month_format, 'app_dysfonctionnement_export' );
    });

    $('.export-year').click(function(){
        var year = $('.year').val();
        exportDysfonctionnements( year, null, 'app_dysfonctionnement_export_year' );
    });

    $('.matricule').text( $('.mat').length );

    var count_modifications = 0;
    $('.mod').each(function(){
        if( $(this).text()!= '' )count_modifications+=parseInt($(this).text());
    });
    $('.modification').text( count_modifications );

    var count_min = 0;
    $('.mi').each(function(){
        if( $(this).text() != '' )
        {
            var num = $(this).text();
            count_min += parseInt( num );
        }
    });
    $('.min').text( count_min );

    var count_maj = 0;
    $('.ma').each(function(){
        if( $(this).text()!= '' )
        {
            var num = $(this).text();
            count_maj += parseInt( num );
        }
    });
    $('.maj').text( count_maj );

    var count_p_d = 0;
    $('.p_d').each(function(){
        if( $(this).text()!= '' )count_p_d+=parseInt($(this).text());
    });
    $('.pv_decale').text( count_p_d );

    var count_a_g = 0;
    $('.a_g').each(function(){
        if( $(this).text()!= '' )count_a_g+=parseInt($(this).text());
    });
    $('.annule_grille').text( count_a_g );

    var count_a_p = 0;
    $('.a_p').each(function(){
        if( $(this).text()!= '' )count_a_p+=parseInt($(this).text());
    });
    $('.annule_pv').text( count_a_p );

    var count_fact_min = 0;
    $('.fact_min').each(function(){
        if( $(this).text()!= '' )count_fact_min += parseInt($(this).text());
    });
    $('.fact_mi').text( count_fact_min );

    var count_fact_maj = 0;
    $('.fact_maj').each(function(){
        if( $(this).text()!= '' )count_fact_maj += parseInt($(this).text());
    });
    $('.fact_ma').text( count_fact_maj );
});

function exportDysfonctionnements( year, month_format, route_controller ){
    
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
    $('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');

    $.ajax({

       	url : Routing.generate(route_controller, true),
		type : 'POST',
        data : { year_to_show: year, month_to_show: month_format },
		async: false, 
		dataType : 'json',
		success : function(response, statut){
            window.location.href = base_url+'export_public/Dysfonctionnement.xlsx';
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

function getMonth( month )
{
    var month_format = 0;
        switch (month)
        {
            case '01': month_format = 1;
            break;
            case '02': month_format = 2;
            break;
            case '03': month_format = 3;
            break;
            case '04': month_format = 4;
            break;
            case '05': month_format = 5;
            break;
            case '06': month_format = 6;
            break;
            case '07': month_format = 7;
            break;
            case '08': month_format = 8;
            break;
            case '09': month_format = 9;
            break;
            default: month_format = month;
        }
        return month_format;
}