$(document).ready(function(){
	$('.collapse').collapse();

	$('[data-submenu]').submenupicker();
	
	$('.export-referentiel').click(function(){
		exportJson( );
	});	
    
	$('.update-referentiel').click(function(){
		updateReferentiel( );
	});

	$('.planSondage-export').click(function(){
		var mois_saisie = prompt('Veuillez saisir un mois du trimestre en cours');
		mois_saisie = mois_saisie.toLowerCase();
		/*var mois=1;
		switch( mois_saisie ) {
			case 'janvier':
				mois = 1;
				break;
			case 'février':
				mois = 2;
				break;
			case 'mars':
				mois = 3;
				break;
			case 'avril':
				mois = 1;
				break;
			case 'mai':
				mois = 2;
				break;
			case 'juin':
				mois = 3;
				break;
			case 'juillet':
				mois = 1;
				break;
			case 'août':
				mois = 2;
				break;
			case 'septembre':
				mois = 3;
				break;
			case 'octobre':
				mois = 1;
				break;
			case 'novembre':
				mois = 2;
				break;
			case 'décembre':
				mois = 3;
				break;
} */
		planSondageExport( mois_saisie );

	});

		$('.bus_plan_sondage_export').click(function(){
			var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
			window.location.href = base_url+'/export_public/plan_sondage_bus.xlsx';
		});
		$('.client_plan_action').click(function(){
			var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
			window.location.href = base_url+'/export_public/plan_action.xlsx';
		});

		$('.export-referentiel_today').click(function(e){
			e.preventDefault();
			var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
			$('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');
			$.ajax({
				
				async: true,
				url : Routing.generate('export_referentiel_today', true),
				type : 'POST',
				async: false, 
				success : function(response, statut){
				  window.open(base_url+'/export_public/Referentiel_du_jour.json', '_blank');
				  $('.loader').empty('.svg-loader');
				},
				error : function(resultat, statut, erreur){
					alert('Une erreur s\'est produite!');
						$('.loader').empty('.svg-loader');
				},
				complete : function(resultat, statut){
				  $('.loader').empty('.svg-loader');
				}
		  });
	});
});

function planSondageExport( mois )
{
	var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');

	$('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');
	$.ajax({

	    url : Routing.generate('pa_plan_sondage_export', true),
	    type : 'POST',
		data: {mois: mois},
		dataType: 'json',
	    async: false, 
	    success : function(response, statut){
			window.location.href = base_url+'/export_public/PlanSondage.xlsx';
	    },
	    error : function(resultat, statut, erreur){
            alert('Une erreur s\'est produite!');
				$('.loader').empty('.svg-loader');
	    },
	    complete : function(resultat, statut){
      	$('.loader').empty('.svg-loader');
    	}
  });
}

function updateReferentiel( )
{
	var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
	$('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');
	$.ajax({

	    url : Routing.generate('referentiel_update', true),
	    type : 'POST',
	    async: false, 
	    success : function(response, statut){
	      if( response == true )alert('La génération est réalisée avec succès!');
	      $('.loader').empty('.svg-loader');
	    },
	    error : function(resultat, statut, erreur){
            alert('Une erreur s\'est produite!');
				$('.loader').empty('.svg-loader');
	    },
	    complete : function(resultat, statut){
      	$('.loader').empty('.svg-loader');
    	}
  });
}

function exportJson( limit, offset )
{
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
	$('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');
	
	$.ajax({

            url : Routing.generate('referentiel_client_export', true),
            type : 'POST',
            async: false, 
            success : function(response, statut){
                window.location.href = base_url+'/JSON/referentiel/referentiel.xlsx';
				$('.loader').empty('.svg-loader');
            },
            error : function(resultat, statut, erreur){
                alert('Une erreur s\'est produite!');
				$('.loader').empty('.svg-loader');
            },
            complete : function(resultat, statut){
                $('.loader').empty('.svg-loader');
            }
            
		});
		
}