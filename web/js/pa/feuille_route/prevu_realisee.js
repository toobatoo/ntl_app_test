$(document).ready(function(){
    $('.add').click(function(){
        window.location.href = Routing.generate('pa_prevu_realise_add', true);
    });
});