$(document).ready(function(){
  $('.jumbotron').hide();
    $('.select-mois').change(function(){
        $('.select-zones').empty();
        getZonesByMonth( $(this).val() );
    });
    $('.select-zones').change(function(){
        window.location.href = Routing.generate('pa_feuille_route_home', {'month': $('.select-mois option:selected').val(),
                                                                            'zone': $(this).val()});
    });
    $('.save-planning').click(function(){
        setZoneEnq();
    });
    $('.export-planning').click(function(){
        
        var mois = $('.mois-title').val();
        var zone = $('.zone-title').val();
        var enq = $('.enqueteur-title').val();
        var date = $('.date-title').val();
        var debut = $('.date-debut-title').val();
        var fin = $('.date-fin-title').val();
        planningExport( mois, zone, enq, date, debut, fin );
    });

    $('.import-by-list').click(function(){
      $('.jumbotron').show();
    });

    $('.download-example').click(function(e){
      e.preventDefault();
      var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
      window.location.href = base_url+'/export_public/Feuille_route/import_example.csv';
    });
  
});


function planningExport( mois, zone, enq, date, debut, fin )
{
    var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
    $('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');

    $.ajax({

      url : Routing.generate('pa_feuille_route_export', true),
      type : 'POST',
      async: false, 
      data: { mois: mois, zone: zone, enq: enq, date: date, debut: debut, fin: fin },
      //dataType : 'json',
      success : function(response, statut){
        window.location.href = base_url+'export_public/Planning.xlsx';
			},
      error : function(resultat, statut, erreur){
        console.log('ERREUR: '+erreur);
        $('.loader').empty('.svg-loader');
      },
      complete : function(resultat, statut){
        $('.loader').empty('.svg-loader');
      }
    });
}

function setZoneEnq( )
{
    var mois = $('.mois-title').val();
    var zone = $('.zone-title').val();
    var enqueteur = $('.enqueteur-title').val();
    var date = $('.date-title').val();
    var plage_horaire_debut = $('.plage-debut-title').val();
    var plage_horaire_fin = $('.plage-fin-title').val();

    $.ajax({

      url : Routing.generate('pa_feuille_route_save', true),
      type : 'POST',
      async: false, 
      data: { mois: mois, zone: zone, enqueteur: enqueteur, date: date, plage_horaire_debut: plage_horaire_debut, plage_horaire_fin: plage_horaire_fin },
      dataType : 'json',
      success : function(response, statut){
        alert('Enregistrement effectué!');
      },
      error : function(resultat, statut, erreur){
        alert('Problème d\'enregistrement!');
      },
      complete : function(resultat, statut){
        
      }
    });
}

function getZonesByMonth( month )
{
    $.ajax({

      url : Routing.generate('pa_feuille_route_select_zones', true),
      type : 'POST',
      async: false, 
      data: {month: month},
      dataType : 'json',
      success : function(response, statut){
        var option = '<option>Zones</option>';
			for(var i=0; i<response.length; i++)
			{
				option += '<option value="'+response[i].zone+'">'+response[i].zone+'</option>';
			}
			$('.select-zones').append( option );
      },
      error : function(resultat, statut, erreur){
        console.log('ERREUR: '+erreur);
      },
      complete : function(resultat, statut){
        
      }
    });
}