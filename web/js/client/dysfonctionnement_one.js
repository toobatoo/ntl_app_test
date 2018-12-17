$(document).ready(function(){
    $('.id, .month_to_show, .year_to_show').hide();

    $('.save-client').click(function(){
        updateClient();
    });
    $('.btn-back').click(function(){
        window.location.href = Routing.generate('app_dysfonctionnement', {year_to_show: $('.year_to_show').text(), 
                month_to_show: $('.month_to_show').text()});
    });

    
});

function updateClient()
{
    $.ajax({

       	url : Routing.generate('client_dysfonctionnement_update_client_one', true),
		type : 'POST',
        data : {id: $('.id').text(), matricule: $('.matricule').val(), modification: $('.modification').val()
                , date: $('.date').val(), ligne: $('.ligne').val(), typologie: $('.typologie').val()
                , signalement: $('.signalement').val(), reponse_ot: $('.reponse_ot').val(),
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