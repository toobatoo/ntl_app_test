$(document).ready(function(){
   //------Recherche par sélection
    $('.glyphicon-play-circle').click(function(){
        var year = $('.year').val();
        var month = $('.month').val();
        
        var month_format = getMonth( month );
        window.location.href = Routing.generate('app_ticket', {year_to_show: year, 
                month_to_show: month_format});
    });

    $('.add').click(function(){
        var year = $('.year').val();
        var month = $('.month').val();
        
        var month_format = getMonth( month );
        window.location.href = Routing.generate('app_ticket_add_page', {year_to_show: year, 
                month_to_show: month_format});
    });

    $('.glyphicon-remove').click(function(){
        var year = $('.year').val();
        var month = $('.month').val();
        window.location.href = Routing.generate('app_ticket_remove', { id: $(this).parent('td').find('.id').val(),
                year_to_show: year, 
                month_to_show: month, name_file: $(this).parent().parent().find('.name_file').text() });
    });
});


function getMonth( month )
{
    var month_format = 0;
        switch (month)
        {
            case '01': month_format = 1;
            break;
            case '02': month_format = 2;
            break;
            case '03': month_format = 3;
            break;
            case '04': month_format = 4;
            break;
            case '05': month_format = 5;
            break;
            case '06': month_format = 6;
            break;
            case '07': month_format = 7;
            break;
            case '08': month_format = 8;
            break;
            case '09': month_format = 9;
            break;
            default: month_format = month;
        }
        return month_format;
}