$(document).ready(function(){

    $('.btn-success').click(function(){
        var base_url = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
        $('.loader').append('<img src="'+base_url+'/images/gears.svg" class="svg-loader" />');

        setTimeout(submitForm, 1000);
    });
});

function submitForm()
{
    $('.form').submit();
}