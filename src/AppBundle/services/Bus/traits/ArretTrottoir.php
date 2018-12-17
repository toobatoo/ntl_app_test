<?php
namespace AppBundle\services\Bus\traits;

trait ArretTrottoir
{
	function anomalieMontee( $field_MR_2_1_detail )
	{
		if( $field_MR_2_1_detail == 'Aucune gêne' )
			return '{
						"itemId":100000310,
						"saisieLibre":"",
						"nombre":"",
						"commentaire": "",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1344,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail == 'Autre gêne' )
			return '{
						"itemId":100000310,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1345,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail == 'Stationnement' )
			return '{
						"itemId":100000310,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1346,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail == 'Travaux' )
			return '{
						"itemId":100000310,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1347,
							"isReponseOui":true
							}
						]
					}';

		else return '';
	}

	function anomalieDescente( $field_MR_2_1_detail_bis )
	{
		if( $field_MR_2_1_detail_bis == 'Aucune gêne' )
			return '{
						"itemId":100000311,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1348,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail_bis == 'Autre gêne' )
			return '{
						"itemId":100000311,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1349,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail_bis == 'Stationnement' )
			return '{
						"itemId":100000311,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1350,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail_bis == 'Travaux' )
			return '{
						"itemId":100000311,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1351,
							"isReponseOui":true
							}
						]
					}';

		else return '';
	}
}