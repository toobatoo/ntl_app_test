<?php
namespace AppBundle\services\Pa\traits;

trait Q4_2
{
    function Q_4_2( $Q_4_2_in, $Q_4_2_obs_in )
    {
        if( $Q_4_2_in == 'Absent' )
		{
			return '{
						"itemId":100000049,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1219,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_2_obs_in).'"
							}
						]
					},';
				}
				
		else if( $Q_4_2_in == 'Illisible' )
		{
			return '{
						"itemId":100000049,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1220,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_2_obs_in).'"
							}
						]
					},';
		}
								
		else if( $Q_4_2_in == 'Erroné' )
		{
			return '{
						"itemId":100000049,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1221,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_2_obs_in).'"
							}
						]
					},';
		}
		else return '';
    }
}