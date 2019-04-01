<?php
namespace AppBundle\services\Pa\traits;

trait Q4_8
{
    function Q_4_8( $Q_4_8_in, $Q_4_8_obs_in )
    {
        if( $Q_4_8_in == 'Absent' )
		{
			return '{
						"itemId":100000055,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_8_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1238,
								"isReponseOui":true
							}
						]
					},';
				}
				
		else if( $Q_4_8_in == 'Illisible' )
		{
			return '{
						"itemId":100000055,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_8_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1239,
								"isReponseOui":true
							}
						]
					},';
		}
								
		else if( $Q_4_8_in == 'Erroné' )
		{
			return '{
						"itemId":100000055,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_8_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1240,
								"isReponseOui":true
							}
						]
					},';
		}
		else return '';
    }
}