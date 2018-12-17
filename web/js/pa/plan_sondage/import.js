$(document).ready(function(){

    $('.upload-plan').click(function(){
        var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
        $('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');

        setTimeout(submitForm, 1000);
    });

    $('.reset-zone-enq').click(function(){
        if( confirm('Vous êtes sur le point de supprimer la base des plannings') )resetZoneEnq();
    });

    $('.view-fichier-global').click(function(){
        window.location.href = Routing.generate('pa_fichier_global_view');
    });
    $('.view-zone-enq').click(function(){
        window.location.href = Routing.generate('pa_zone_enqueteur_view');
    });
});


function submitForm()
{
    $('.form').submit();
}

function resetZoneEnq()
{
    
}