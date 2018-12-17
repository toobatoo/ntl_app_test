<?php
namespace AppBundle\services\Bus\traits;

trait MR4
{
	function MR4_1( $field_MR4_1 )
	{
		if( $field_MR4_1 != 'non' && $field_MR4_1 != 'NO' )
			return '{
						"itemId":100000290,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR4_1).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}

	function MR4_2( $field_MR4_2 )
	{
		if( $field_MR4_2 != 'non' && $field_MR4_2 != 'NO' )
			return '{
						"itemId":100000291,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.str_replace('"','',$field_MR4_1).'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
}