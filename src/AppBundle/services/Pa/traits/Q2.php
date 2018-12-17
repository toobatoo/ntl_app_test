<?php
namespace AppBundle\services\Pa\traits;

trait Q2
{
    function Q_2( $Q_2_1_in, $Q_2_2_in, $Q_2_3_in, $Q_2_4_in , $Q_2_5_in )
    {
        $Q_2_1="false";
		$Q_2_1_txt="";
		if( $Q_2_1_in == 'non' )$Q_2_1 = "false";
		else
		{
			$Q_2_1 = "true";
			$Q_2_1_txt = $Q_2_1_in;
		}
				 
		$Q_2_2="false";
		$Q_2_2_txt="";
		if( $Q_2_2_in == 'non' )$Q_2_2 = "false";
		else
		{
			$Q_2_2 = "true";
			$Q_2_2_txt = $Q_2_2_in;
		}
				 
		$Q_2_3="false";
		$Q_2_3_txt="";
		if( $Q_2_3_in == 'non' )$Q_2_3 = "false";
		else
		{
			$Q_2_3 = "true";
			$Q_2_3_txt = $Q_2_3_in;
		}
				 
		$Q_2_4="false";
		$Q_2_4_txt="";
		if( $Q_2_4_in == 'non' )$Q_2_4 = "false";
		else
		{
			$Q_2_4 = "true";
			$Q_2_4_txt = $Q_2_4_in;
		}
				 
		$Q_2_5="false";
		$Q_2_5_txt="";
		if( $Q_2_5_in == 'non' )$Q_2_5 = "false";
		else
		{
			$Q_2_5 = "true";
			$Q_2_5_txt = $Q_2_5_in;
		}

		return '{
			               "itemId":100000038,
			               "saisieLibre":"'.str_replace('"','',$Q_2_1_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_2_1.',
			               "itemChoixMobileAndroidList":[]
							},
			               	{
			               "itemId":100000039,
			               "saisieLibre":"'.str_replace('"','',$Q_2_2_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_2_2.',
			               "itemChoixMobileAndroidList":[]
							},
			               	{
			               "itemId":100000040,
			               "saisieLibre":"'.str_replace('"','',$Q_2_3_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_2_3.',
			               "itemChoixMobileAndroidList":[]
							},
			               	{
			               "itemId":100000041,
			               "saisieLibre":"'.str_replace('"','',$Q_2_4_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_2_4.',
			               "itemChoixMobileAndroidList":[]
							},
			               	{
			               "itemId":100000042,
			               "saisieLibre":"'.str_replace('"','',$Q_2_5_txt).'",
			               "nombre":"",
			               "isReponseOui":'.$Q_2_5.',
			               "itemChoixMobileAndroidList":[]
							},';
    }
}