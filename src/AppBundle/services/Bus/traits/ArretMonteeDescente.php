<?php
namespace AppBundle\services\Bus\traits;

trait ArretMonteeDescente
{
	function distanceTrottoirMontee( $field_MR_2_1 )
	{
		if( $field_MR_2_1 == 'Oui' )
			return '{
						"itemId":100000309,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1342,
							"isReponseOui":true
							}
						]
					},';
		else 
			return '';
	}

	function distanceTrottoirDescente( $field_MR_2_1_bis )
	{
		if( $field_MR_2_1_bis == 'Oui' )
			return '{
						"itemId":100000309,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1343,
							"isReponseOui":true
							}
						]
					},';
		else 
			return '';
	}

	function testMonteeAndDescente( $field_MR_2_1, $field_MR_2_1_bis )
	{
		if( ($field_MR_2_1 == 'non') && ($field_MR_2_1_bis == 'non') )
			return '{
				"enqueteGrilleId":10,
    			"grilleVersionId":1103,
				"dateSaisie":1476158280000,
		        "numeroCoquille":"6611",
		        "numeroAdup":null,
		        "pointArretId":0,
		        "dateValidation":1476158280000,
		        "libelle":"Arrêt au trottoir",
		        "pointArretLibelle":"GARE MONTPARNASSE",
		        "pointArretDirectionLibelle":"ROBERT WAGNER",
		        "typeObjetMesureCode":"MRE",
				"itemMobileAndroidList":[]
					},';
		else 
			return '';
	}
}