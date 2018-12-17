$(document).ready(function(){
    $('.submit').click(function(){

        var id= $('.id').val();
        var prestataireRessourceId= $('.prestataireRessourceId').val();
        var matricule_OT= $('.matricule_OT').val();

        window.location.href = Routing.generate('client_matricule_update_data', {'id': id, 'prestataire_ressource_id': prestataireRessourceId,
                                        'matricule_ot': matricule_OT });
    });
});