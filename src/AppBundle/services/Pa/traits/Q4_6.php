<?php
namespace AppBundle\services\Pa\traits;

trait Q4_6
{
    function Q_4_6( $Q_4_6_in, $Q_4_6_obs_in )
    {
        if( $Q_4_6_in == 'Absent' )
		{
			return '{
						"itemId":100000053,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_6_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1232,
								"isReponseOui":true
							}
						]
					},';
				}
				
		else if( $Q_4_6_in == 'Illisible' )
		{
			return '{
						"itemId":100000053,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_6_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1233,
								"isReponseOui":true
							}
						]
					},';
		}
								
		else if( $Q_4_6_in == 'Erroné' )
		{
			return '{
						"itemId":100000053,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_6_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1234,
								"isReponseOui":true
							}
						]
					},';
		}
		else return '';
    }
}