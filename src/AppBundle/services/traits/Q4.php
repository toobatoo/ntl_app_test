<?php
namespace AppBundle\services\Bus\traits;

trait Q4
{
	function Q4_1( $field_Q4_1_detail, $field_Q4_1 )
	{
		if( $field_Q4_1_detail == 'Partiellement' )
			return '{
						"itemId":55,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						  "itemChoixId":1065,
						  "commentaire": "'.$field_Q4_1.'",
						  "isReponseOui": true
						}
						]
					},';

		else if( $field_Q4_1_detail == 'Indisponible' )
			return '{
						"itemId":55,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						  "itemChoixId":1066,
						  "commentaire": "'.$field_Q4_1.'",
						  "isReponseOui": true
						}
						]
					},';
		
		else return '';
	}

	function Q4_2( $field_Q4_2_detail, $field_Q4_2 )
	{
		if( $field_Q4_2_detail == 'Partiellement' )
			return '{
						"itemId":55,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						  "itemChoixId":1067,
						  "commentaire": "'.$field_Q4_2.'",
						  "isReponseOui": true
						}
						]
					},';
					
		else if( $field_Q4_2_detail == 'Indisponible' )
			return '{
						"itemId":55,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						  "itemChoixId":1068,
						  "commentaire": "'.$field_Q4_2.'",
						  "isReponseOui": true
						}
						]
					},';
		
		else return '';
	}

	function Q4_3( $field_Q4_3_detail, $field_Q4_3 )
	{
		if( $field_Q4_3_detail == 'Partiellement' )
			return '{
						"itemId":55,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						  "itemChoixId":1069,
						  "commentaire": "'.$field_Q4_3.'",
						  "isReponseOui": true
						}
						]
					},';
					
		else if( $field_Q4_3_detail == 'Indisponible' )
			return '{
						"itemId":55,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						  "itemChoixId":1070,
						  "commentaire": "'.$field_Q4_3.'",
						  "isReponseOui": true
						}
						]
					},';
		
		else return '';
	}
}