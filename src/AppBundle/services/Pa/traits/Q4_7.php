<?php
namespace AppBundle\services\Pa\traits;

trait Q4_7
{
    function Q_4_7( $Q_4_7_in, $Q_4_7_obs_in )
    {
        if( $Q_4_7_in == 'Absent' )
		{
			return '{
						"itemId":100000054,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_7_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1235,
								"isReponseOui":true
							}
						]
					},';
				}
				
		else if( $Q_4_7_in == 'Illisible' )
		{
			return '{
						"itemId":100000054,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_7_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1236,
								"isReponseOui":true
							}
						]
					},';
		}
								
		else if( $Q_4_7_in == 'Erroné' )
		{
			return '{
						"itemId":100000054,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"commentaire": "'.str_replace('"','',$Q_4_7_obs_in).'",
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1237,
								"isReponseOui":true
							}
						]
					},';
		}
		else return '';
    }
}