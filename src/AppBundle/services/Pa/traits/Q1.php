<?php
namespace AppBundle\services\Pa\traits;

trait Q1
{
    function Q_1( $Q_1_1, $Q_1_2, $Q_1_3, $Q_1_4 )
    {
        if( $Q_1_1 == 'Oui' )$Q_1_1 = "true";else $Q_1_1 = "false";
		if( $Q_1_2 == 'Oui' )$Q_1_2 = "true";else $Q_1_2 = "false";
		if( $Q_1_3 == 'Oui' )$Q_1_3 = "true";else $Q_1_3 = "false";
		if( $Q_1_4 == 'Oui' )$Q_1_4 = "true";else $Q_1_4 = "false";
				return '{
    					   "itemId":100000020,
			               "saisieLibre":"",
			               "nombre":"",
			               "isReponseOui":'.$Q_1_1.',
			               "itemChoixMobileAndroidList":[]
    			},
			            	{
			               "itemId":100000021,
			               "saisieLibre":"",
			               "nombre":"",
			               "isReponseOui":'.$Q_1_2.',
			               "itemChoixMobileAndroidList":[]
				},
			    {
			               "itemId":100000022,
			               "saisieLibre":"",
			               "nombre":"",
			               "isReponseOui":'.$Q_1_3.',
			               "itemChoixMobileAndroidList":[]
				},
				{
			               "itemId":100000023,
			               "saisieLibre":"",
			               "nombre":"",
			               "isReponseOui":'.$Q_1_4.',
			               "itemChoixMobileAndroidList":[]
				},';
    }
}

