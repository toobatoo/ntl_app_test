$(document).ready(function(){

    $('.glyphicon-trash').click(function(){
        var id = $(this).parent('td').next('td').text();
        window.location.href = Routing.generate( 'pa_plan_sondage_remove_zone_enq', { id: id } );
    });
    
});
