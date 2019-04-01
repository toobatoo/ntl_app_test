<?php
namespace AppBundle\services\Pa\traits;

trait Q4_4
{
    function Q_4_4( $Q_4_4_in, $Q_4_4_obs_in )
    {
        if( $Q_4_4_in == 'Absent' )
		{
			return '{
						"itemId":100000051,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_4_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1225,
								"isReponseOui":true
							}
						]
					},';
				}
				
		else if( $Q_4_4_in == 'Illisible' )
		{
			return '{
						"itemId":100000051,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_4_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1226,
								"isReponseOui":true
							}
						]
					},';
		}
								
		else if( $Q_4_4_in == 'Erroné' )
		{
			return '{
						"itemId":100000051,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_4_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1227,
								"isReponseOui":true
							}
						]
					},';
		}
		else return '';
    }
}