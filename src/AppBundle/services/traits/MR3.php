<?php
namespace AppBundle\services\Bus\traits;

trait MR3
{
	function MR3_1( $field_MR3_1 )
	{
		if( $field_MR3_1 != 'non' && $field_MR3_1 != 'NO' )
			return '{
						"itemId":100000288,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.$field_MR3_1.'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}

	function MR3_2( $field_MR3_2 )
	{
		if( $field_MR3_2 != 'non' && $field_MR3_2 != 'NO' )
			return '{
						"itemId":100000289,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.$field_MR3_2.'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
}