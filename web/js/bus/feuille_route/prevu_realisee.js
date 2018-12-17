$(document).ready(function(){
    $('.add').click(function(){
        window.location.href = Routing.generate('bus_prevu_realise_add', true);
    });
});