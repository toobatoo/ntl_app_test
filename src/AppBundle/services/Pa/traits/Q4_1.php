<?php
namespace AppBundle\services\Pa\traits;

trait Q4_1
{
    function Q_4_1( $Q_4_1_in, $Q_4_1_obs_in )
    {
        if( $Q_4_1_in == 'Absent' )
		{
			return '{
						"itemId":100000048,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_1_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1216,
								"isReponseOui":true
							}
						]
					},';
				}
				
		else if( $Q_4_1_in == 'Illisible' )
		{
			return '{
						"itemId":100000048,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_1_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1217,
								"isReponseOui":true
							}
						]
					},';
		}
								
		else if( $Q_4_1_in == 'Erroné' )
		{
			return '{
						"itemId":100000048,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_1_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1218,
								"isReponseOui":true
							}
						]
					},';
		}
		else return '';
    }
}