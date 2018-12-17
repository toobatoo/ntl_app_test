<?php
namespace AppBundle\services\Bus\traits;

trait Q5
{
	function Q5_1( $field_Q5_1 )
	{
		if( substr( $field_Q5_1, 0, 6 ) == 'Absent' )
			return '{
						"itemId":58,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1071,
						    "commentaire": "'.substr( $field_Q5_1, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_1, 0, 9 ) == 'Illisible' )
			return '{
						"itemId":58,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1072,
						    "commentaire": "'.substr( $field_Q5_1, 10 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_1, 0, 6 ) == 'Erroné' )
			return '{
						"itemId":58,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1073,
						    "commentaire": "'.substr( $field_Q5_1, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';		
		
		else return '';
	}

	function Q5_2( $field_Q5_2 )
	{
		if( substr( $field_Q5_2, 0, 6 ) == 'Absent' )
			return '{
						"itemId":59,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1074,
						    "commentaire": "'.substr( $field_Q5_2, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_2, 0, 9 ) == 'Illisible' )
			return '{
						"itemId":59,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1075,
						    "commentaire": "'.substr( $field_Q5_2, 10 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_2, 0, 6 ) == 'Périmé' )
			return '{
						"itemId":59,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1076,
						    "commentaire": "'.substr( $field_Q5_2, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';		
		
		else return '';
	}

	function Q5_3( $field_Q5_3 )
	{
		if( substr( $field_Q5_3, 0, 6 ) == 'Absent' )
			return '{
						"itemId":60,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1077,
						    "commentaire": "'.substr( $field_Q5_3, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_3, 0, 9 ) == 'Illisible' )
			return '{
						"itemId":60,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1078,
						    "commentaire": "'.substr( $field_Q5_3, 10 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else return '';
	}

	function Q5_4( $field_Q5_4 )
	{
		if( substr( $field_Q5_4, 0, 6 ) == 'Absent' )
			return '{
						"itemId":3033,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1079,
						    "commentaire": "'.substr( $field_Q5_4, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_4, 0, 9 ) == 'Illisible' )
			return '{
						"itemId":3033,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1080,
						    "commentaire": "'.substr( $field_Q5_4, 10 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_4, 0, 6 ) == 'Erroné' )
			return '{
						"itemId":3033,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1081,
						    "commentaire": "'.substr( $field_Q5_4, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else return '';
	}

	function Q5_5( $field_Q5_5 )
	{
		if( substr( $field_Q5_5, 0, 6 ) == 'Absent' )
			return '{
						"itemId":63,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1082,
						    "commentaire": "'.substr( $field_Q5_5, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_5, 0, 9 ) == 'Illisible' )
			return '{
						"itemId":63,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1083,
						    "commentaire": "'.substr( $field_Q5_5, 10 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_5, 0, 6 ) == 'Erroné' )
			return '{
						"itemId":63,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1084,
						    "commentaire": "'.substr( $field_Q5_5, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else return '';
	}

	function Q5_6( $field_Q5_6 )
	{
		if( substr( $field_Q5_6, 0, 6 ) == 'Absent' )
			return '{
						"itemId":631,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1085,
						    "commentaire": "'.substr( $field_Q5_6, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_6, 0, 9 ) == 'Illisible' )
			return '{
						"itemId":631,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1086,
						    "commentaire": "'.substr( $field_Q5_6, 10 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_6, 0, 6 ) == 'Erroné' )
			return '{
						"itemId":631,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1087,
						    "commentaire": "'.substr( $field_Q5_6, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else return '';
	}

	function Q5_7( $field_Q5_7 )
	{
		if( substr( $field_Q5_7, 0, 6 ) == 'Absent' )
			return '{
						"itemId":100600,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1088,
						    "commentaire": "'.substr( $field_Q5_7, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_7, 0, 9 ) == 'Illisible' )
			return '{
						"itemId":100600,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1089,
						    "commentaire": "'.substr( $field_Q5_7, 10 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_7, 0, 6 ) == 'Erroné' )
			return '{
						"itemId":100600,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1090,
						    "commentaire": "'.substr( $field_Q5_7, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else return '';
	}

	function Q5_8( $field_Q5_8 )
	{
		if( substr( $field_Q5_8, 0, 6 ) == 'Absent' )
			return '{
						"itemId":100610,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1091,
						    "commentaire": "'.substr( $field_Q5_8, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_8, 0, 9 ) == 'Illisible' )
			return '{
						"itemId":100610,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1092,
						    "commentaire": "'.substr( $field_Q5_8, 10 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else if( substr( $field_Q5_8, 0, 6 ) == 'Erroné' )
			return '{
						"itemId":100610,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": false,
						"itemChoixMobileAndroidList":[
						{
						    "itemChoixId":1093,
						    "commentaire": "'.substr( $field_Q5_8, 7 ).'",
						    "isReponseOui": true
						}
							]
					},';

		else return '';
	}
}