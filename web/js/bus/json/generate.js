$(document).ready(function(){
	
	$('.generate_json').click(function(){
		var date = $('.day').val()+'/'+$('.month').val()+'/'+$('.year').val();
		generate_json( date );
	});

});

function generate_json( date )
{
	$.ajax({

	    url : Routing.generate('bus_json_generate', true),
	    type : 'POST',
	    async: false, 
	    data : {'date':date},
	    dataType: 'json',
	    success : function(response, statut){
	      if( response == true )alert('La génération est réalisée avec succès!');
	      else alert('Un problème est survenu lors de la génération!');
	    },
	    error : function(resultat, statut, erreur){
	    },
	    complete : function(resultat, statut){
      
    	}
  });
}