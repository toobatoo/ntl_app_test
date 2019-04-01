<?php
namespace AppBundle\services\Pa\traits;

trait Q4_9
{
    function Q_4_9( $Q_4_9_in, $Q_4_9_obs_in )
    {
        if( $Q_4_9_in == 'Absent' )
		{
			return '{
						"itemId":100000056,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_9_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1241,
								"isReponseOui":true
							}
						]
					}';
				}
				
		else if( $Q_4_9_in == 'Illisible' )
		{
			return '{
						"itemId":100000056,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_9_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1242,
								"isReponseOui":true
							}
						]
					}';
		}
								
		else if( $Q_4_9_in == 'Erroné' )
		{
			return '{
						"itemId":100000056,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_9_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1243,
								"isReponseOui":true
							}
						]
					}';
		}
		else return '';
    }
}