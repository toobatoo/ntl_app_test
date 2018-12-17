<?php
namespace AppBundle\services\Bus\traits;

trait Q3
{
	function Q3_1( $field_Q3_1_detail, $field_Q3_1 )
	{
		if( $field_Q3_1 == 'Absent' )
			return '{
						"itemId":51,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1053,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_1_detail).'"
							}
						]
					},';
		else if( $field_Q3_1 == 'Erroné' )
			return '{
						"itemId":51,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1055,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_1_detail).'"
							}
						]
					},';
		else if( $field_Q3_1 == 'Illisible' )
			return '{
						"itemId":51,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1054,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_1_detail).'"
							}
						]
					},';
		else return '';
	}

	function Q3_2( $field_Q3_2_detail, $field_Q3_2 )
	{
		if( $field_Q3_2 == 'Absent' )
			return '{
						"itemId":53,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1056,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_2_detail).'"
							}
						]
					},';
		else if( $field_Q3_2 == 'Erroné' )
			return '{
						"itemId":53,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1058,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_2_detail).'"
							}
						]
					},';
		else if( $field_Q3_2 == 'Illisible' )
			return '{
						"itemId":53,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1057,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_2_detail).'"
							}
						]
					},';
		else return '';
	}

	function Q3_3( $field_Q3_3_detail, $field_Q3_3 )
	{
		if( $field_Q3_3 == 'Absent' )
			return '{
						"itemId":52,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1059,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_3_detail).'"
							}
						]
					},';
		else if( $field_Q3_3 == 'Erroné' )
			return '{
						"itemId":52,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1061,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_3_detail).'"
							}
						]
					},';
		else if( $field_Q3_3 == 'Illisible' )
			return '{
						"itemId":52,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1060,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_3_detail).'"
							}
						]
					},';
		else return '';
	}

	function Q3_4( $field_Q3_4_detail, $field_Q3_4 )
	{
		if( $field_Q3_4 == 'Absent' )
			return '{
						"itemId":54,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1062,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_4_detail).'"
							}
						]
					},';
		else if( $field_Q3_4 == 'Erroné' )
			return '{
						"itemId":54,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1064,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_4_detail).'"
							}
						]
					},';
		else if( $field_Q3_4 == 'Illisible' )
			return '{
						"itemId":54,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId":1063,
							    "isReponseOui": true,
							    "commentaire": "'.str_replace('"','',$field_Q3_4_detail).'"
							}
						]
					},';
		else return '';
	}
}