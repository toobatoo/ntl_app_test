<?php
namespace AppBundle\services\Bus\traits;

trait MR5
{
	function MR5_1( $field_MR5_1 )
	{
		if( $field_MR5_1 != 'non' && $field_MR5_1 != 'NO' )
			return '{
						"itemId":100000292,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR5_1).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}

	function MR5_2( $field_MR5_2 )
	{
		if( $field_MR5_2 != 'non' && $field_MR5_2 != 'NO' )
			return '{
						"itemId":100000293,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR5_2).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
	function MR5_3( $field_MR5_3 )
	{
		if( $field_MR5_3 != 'non' && $field_MR5_3 != 'NO' )
			return '{
						"itemId":100000294,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR5_3).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
	function MR5_4( $field_MR5_4 )
	{
		if( $field_MR5_4 != 'non' && $field_MR5_4 != 'NO' )
			return '{
						"itemId":100000295,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR5_4).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
	function MR5_5( $field_MR5_5 )
	{
		if( $field_MR5_5 != 'non' && $field_MR5_5 != 'NO' )
			return '{
						"itemId":100000296,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR5_5).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
}