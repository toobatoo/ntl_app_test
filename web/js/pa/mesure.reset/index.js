$(document).ready(function(){
    $('.valid').click(function(){
        var mois = $('.mois').val();
        var annee = $('.annee').val();
        if( confirm('Souhaitez-vous archiver le mois suivant: '+$('.mois option:selected').text()+' '+$('.annee option:selected').text()+'?') )
            copyFiles( mois, annee );
    });
});

function copyFiles( mois, annee )
{
	var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
	$('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');
	$.ajax({

	    url : Routing.generate('pa_mesure_copy_files', true),
	    type : 'POST',
		data: { mois: mois, annee: annee },
		dataType: 'json',
	    async: false, 
	    success : function(response, statut){
            
	    },
	    error : function(resultat, statut, erreur){
            alert('Erreur de copie des photos!');
			$('.loader').empty('.svg-loader');
	    },
	    complete : function(resultat, statut){
      	    resetBDD( mois, annee );
    	}
  });
}

function resetBDD( mois, annee )
{
	$.ajax({

	    url : Routing.generate('pa_mesure_reset_bdd', true),
	    type : 'POST',
		data: { mois: mois, annee: annee },
		dataType: 'json',
	    async: false, 
	    success : function(response, statut){
            
	    },
	    error : function(resultat, statut, erreur){
            alert('Erreur de copie de base,' + '\n' + 'il est possible que les données du mois soient déjà historicisées!');
			$('.loader').empty('.svg-loader');
	    },
	    complete : function(resultat, statut){
      	    removeFiles();
    	}
  });
  
}

function removeFiles()
{
	$.ajax({

	    url : Routing.generate('pa_mesure_remove_files', true),
	    type : 'POST',
		dataType: 'json',
	    async: false, 
	    success : function(response, statut){
            alert('Tout s\'est bien passé!');
	    },
	    error : function(resultat, statut, erreur){
			alert('Erreur de suppression des photos!');
			$('.loader').empty('.svg-loader');
	    },
	    complete : function(resultat, statut){
      	    $('.loader').empty('.svg-loader');
            window.location.reload();
    	}
  	});
}