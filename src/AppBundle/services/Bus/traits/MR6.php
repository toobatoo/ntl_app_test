<?php
namespace AppBundle\services\Bus\traits;

trait MR6
{
	function MR6_1( $field_MR6_1 )
	{
		if( $field_MR6_1 != 'non' && $field_MR6_1 != 'NO' )
			return '{
						"itemId":100000297,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR6_1).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}

	function MR6_2( $field_MR6_2 )
	{
		if( $field_MR6_2 != 'non' && $field_MR6_2 != 'NO' )
			return '{
						"itemId":100000298,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR6_2).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
	function MR6_3( $field_MR6_3 )
	{
		if( $field_MR6_3 != 'non' && $field_MR6_3 != 'NO' )
			return '{
						"itemId":100000299,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR6_3).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
	function MR6_4( $field_MR6_4 )
	{
		if( $field_MR6_4 != 'non' && $field_MR6_4 != 'NO' )
			return '{
						"itemId":100000300,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR6_4).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
}