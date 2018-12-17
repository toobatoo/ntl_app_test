$(document).ready(function(){
    $('.month_to_show, .year_to_show').hide();
    $('.save').click(function(){
        addDatas();
    });
    $('.btn-back').click(function(){
        window.location.href = Routing.generate('app_dysfonctionnement', {year_to_show: $('.year_to_show').text(), 
                month_to_show: $('.month_to_show').text()});
    });

    
});

function addDatas()
{
    $.ajax({

       	url : Routing.generate('app_dysfonctionnement_add', true),
		type : 'POST',
        data : { matricule: $('.matricule').val(), modification: $('.modification').val()
                , date: $('.date').val(), ligne: $('.ligne').val(), typologie: $('.typologie').val()
                , signalement: $('.signalement').val(), action: $('.action').val(), 
                    min: $('.min').val(), maj: $('.maj').val()
                , pv_decale: $('.pv_decale').val(), annulation_grille: $('.annulation_grille').val()
                , annulation_pv: $('.annulation_pv').val(), fact_min: $('.fact_min').val()
                , fact_maj: $('.fact_maj').val()},
		async: false, 
		dataType : 'json',
		success : function(response, statut){
            window.location.href = Routing.generate('app_dysfonctionnement', {year_to_show: $('.year_to_show').text(), 
                month_to_show: $('.month_to_show').text()});
		},
		error : function(resultat, statut, erreur){
            alert('Problème de sauvegarde!');
		},
		complete : function(resultat, statut){
            
		}
	});
}