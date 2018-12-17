$(document).ready(function(){
    $('.add').click(function(){
        window.location.href = Routing.generate('client_compte_rendu_add', true);
    });
});