$(document).ready(function(){

    $('.mois_info, .table_info').hide();

    $('.save').click(function(  ){
        
        var listDatas = new Array();
        $('.photo_name').each(function(){
            var datas = {};
            var title = $(this).parent().next('div').find('.photo_title').val();
            datas.name = $(this).text();
            datas.title = title;

            listDatas.push( datas );
        });

        saveListPhotos( listDatas );
    });

    $('.fiche-one').click(function(){
         window.location.href = Routing.generate( 'pa_questionnaire_one', {id: $('.id').text(), table: $('.table_info').text(),
                                             mois: $('.mois_info').text()} );
    });

    $('.fiche-list').click(function(){
        window.location.href = Routing.generate('pa_questionnaire_all', {mois: $('.mois_info').text()} );
    });

    $('.remove').click(function(){
        var photoName = $(this).parent().prev('td').find('.photo_name').text();
        var id = $('.id').text();
        removePhoto( id, photoName );
    });

    initTitlesPhotos();
});

function removePhoto( id, photoName )
{
    $.ajax({

       	url : Routing.generate('pa_photo_remove_one', true),
		type : 'POST',
		data : {id: id, name: photoName},
		async: false, 
		dataType : 'json',
		success : function(response, statut){
            window.location.href = Routing.generate('pa_photo_import', {id: $('.id').text(),
                                                table: $('.table_info').text(), mois: $('.mois_info').text()});
		},
		error : function(resultat, statut, erreur){
            alert('Photo non supprimée, problème!');
		},
		complete : function(resultat, statut){
		}
	});
}

function initTitlesPhotos()
{
    $('.photo_name').each(function(){
        var photoName = $(this).parent().next('div').find('.photo_title');
        $.ajax({

            url : Routing.generate('pa_photo_getname', true),
            type : 'POST',
            data : { id: $('.id').text(), name: $(this).text() },
            async: false, 
            dataType : 'json',
            success : function(response, statut){
                photoName.val( response[0].titre );
            },
            error : function(resultat, statut, erreur){
                photoName.val( $(this).text() );
            },
            complete : function(resultat, statut){
                
            }
	    });
    });
}

function saveListPhotos( datas )
{
    $.ajax({

       	url : Routing.generate('pa_photo_save', true),
		type : 'POST',
		data : {datas: datas, id: $('.id').text()},
		async: false, 
		dataType : 'json',
		success : function(response, statut){
            if(response)alert('Sauvegarde terminée!');
		},
		error : function(resultat, statut, erreur){
            alert('Problème de sauvegarde!');
		},
		complete : function(resultat, statut){
			alert('Sauvegarde terminée!');
		}
	});
}