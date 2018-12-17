<?php
namespace AppBundle\services\Pa\traits;

trait Q4_3
{
    function Q_4_3( $Q_4_3_in, $Q_4_3_obs_in )
    {
        if( $Q_4_3_in == 'Absent' )
		{
			return '{
						"itemId":100000050,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1222,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_3_obs_in).'"
							}
						]
					},';
				}
				
		else if( $Q_4_3_in == 'Illisible' )
		{
			return '{
						"itemId":100000050,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1223,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_3_obs_in).'"
							}
						]
					},';
		}
								
		else if( $Q_4_3_in == 'Erroné' )
		{
			return '{
						"itemId":100000050,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1224,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_3_obs_in).'"
							}
						]
					},';
		}
		else return '';
    }
}