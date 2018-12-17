<?php
namespace AppBundle\services\Pa\traits;

trait Q4_5
{
    function Q_4_5( $Q_4_5_in, $Q_4_5_obs_in )
    {
        if( $Q_4_5_in == 'Absent' )
		{
			return '{
						"itemId":100000052,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1228,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_5_obs_in).'"
							}
						]
					},';
				}
				
		else if( $Q_4_5_in == 'Illisible' )
		{
			return '{
						"itemId":100000052,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1229,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_5_obs_in).'"
							}
						]
					},';
		}
								
		else if( $Q_4_5_in == 'Erroné' )
		{
			return '{
						"itemId":100000052,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
								"itemChoixId": 1230,
								"isReponseOui":true,
								"commentaire": "'.str_replace('"','',$Q_4_5_obs_in).'"
							}
						]
					},';
		}
		else return '';
    }
}