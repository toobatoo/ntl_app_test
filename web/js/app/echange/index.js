$(document).ready(function(){
    $('.new').click(function(){
        $('.form-window').toggle('slow');
    });

    $('.back').click(function(){
        history.back();
    });
});