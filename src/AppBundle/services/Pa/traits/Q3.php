<?php
namespace AppBundle\services\Pa\traits;

trait Q3
{
    function Q_3( $Q_3_1_in, $Q_3_2_in, $Q_3_3_in, $Q_3_4_in , $Q_3_5_in )
    {
				$Q_3_1="false";
				$Q_3_1_txt="";
				if( $Q_3_1_in == 'non' )$Q_3_1 = "false";
				else
				{
					$Q_3_1 = "true";
					$Q_3_1_txt = $Q_3_1_in;
				}
		
				$Q_3_2="false";
				$Q_3_2_txt="";
				if( $Q_3_2_in == 'non' )$Q_3_2 = "false";
				else
				{
					$Q_3_2 = "true";
					$Q_3_2_txt = $Q_3_2_in;
				}
		
				$Q_3_3="false";
				$Q_3_3_txt="";
				if( $Q_3_3_in == 'non' )$Q_3_3 = "false";
				else
				{
					$Q_3_3 = "true";
					$Q_3_3_txt = $Q_3_3_in;
				}
		
				$Q_3_4="false";
				$Q_3_4_txt="";
				if( $Q_3_4_in == 'non' )$Q_3_4 = "false";
				else
				{
					$Q_3_4 = "true";
					$Q_3_4_txt = $Q_3_4_in;
				}
		
				$Q_3_5="false";
				$Q_3_5_txt="";
				if( $Q_3_5_in == 'non' )$Q_3_5 = "false";
				else
				{
					$Q_3_5 = "true";
					$Q_3_5_txt = $Q_3_5_in;
				}
				return '{
			               "itemId":100000033,
			               "saisieLibre":"'.str_replace('"','',$Q_3_1_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_3_1.',
			               "itemChoixMobileAndroidList":[]
							},
			               	{
			               "itemId":100000034,
			               "saisieLibre":"'.str_replace('"','',$Q_3_2_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_3_2.',
			               "itemChoixMobileAndroidList":[]
							},
			               	{
			               "itemId":100000035,
			               "saisieLibre":"'.str_replace('"','',$Q_3_3_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_3_3.',
			               "itemChoixMobileAndroidList":[]
							},
			               	{
			               "itemId":100000036,
			               "saisieLibre":"'.str_replace('"','',$Q_3_4_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_3_4.',
			               "itemChoixMobileAndroidList":[]
							},
			            	{
			               "itemId":100000037,
			               "saisieLibre":"'.str_replace('"','',$Q_3_5_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_3_5.',
			               "itemChoixMobileAndroidList":[]
						},';
	}
}