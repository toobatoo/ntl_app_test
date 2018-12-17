<?php
namespace AppBundle\services\Bus\traits;

trait Q2
{
	function Q2_1( $field_Q2_1 )
	{
		if( $field_Q2_1 != 'non' && $field_Q2_1 != 'NO' )
			return '{
						"itemId":3006,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui": true,
						"commentaire": "'.$field_Q2_1.'",
						"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}

	function Q2_2( $field_Q2_2 )
	{
		if( $field_Q2_2 != 'non' && $field_Q2_2 != 'NO' )
			return '{
					"itemId":3007,
					"saisieLibre":"",
					"nombre":"",
					"isReponseOui": true,
					"commentaire": "'.$field_Q2_2.'",
					"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}

	function Q2_3( $field_Q2_3 )
	{
		if( $field_Q2_3 != 'non' && $field_Q2_3 != 'NO' )
			return '{
					"itemId":3008,
					"saisieLibre":"",
					"nombre":"",
					"isReponseOui": true,
					"commentaire": "'.$field_Q2_3.'",
					"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}

	function Q2_4(  $field_Q2_4 )
	{
		if( $field_Q2_4 != 'non' && $field_Q2_4 != 'NO' )
			return '{
					"itemId":3009,
					"saisieLibre":"",
					"nombre":"",
					"isReponseOui": true,
					"commentaire": "'.$field_Q2_4.'",
					"itemChoixMobileAndroidList":[]
				},';
		else return '';
	}
}