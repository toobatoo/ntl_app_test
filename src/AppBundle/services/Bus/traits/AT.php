<?php
namespace AppBundle\services\Bus\traits;

class AT
{
    private $all='';

    public function getAll( $numero_grille, $numeroAtMontee, $numeroAtDescente, 
                            $dateFinMesure, $coquille, $arretMontee, $direction,
                            $field_MR_2_1, $field_MR_2_1_bis, $field_MR_2_1_detail, $field_MR_2_1_detail_bis, $gipa_montee, $gipa_descente )
    {
        $this->all = '     {
                            "enqueteGrilleId": '.$numeroAtMontee.',
                            "grilleVersionId": 1103,
                            "dateSaisie": '.$dateFinMesure.',
                            "numeroCoquille": "'.$coquille.'",
                            "numeroAdup": null,
							"pointArretId": 0,
                            "dateValidation": '.$dateFinMesure.',
                            "libelle": "Arrêt au trottoir",
                            "pointArretLibelle": "'.$arretMontee.'",
                            "pointArretDirectionLibelle": "'.$direction.'",
                            "typeObjetMesureCode": "MRE",
                            "itemMobileAndroidList": [{
                                                        "itemId":100000309,
                                                        "saisieLibre":"",
														"nombre":"",
														"commentaire": "'.$gipa_montee.'",
                                                        "isReponseOui":false,
                                                        "itemChoixMobileAndroidList":[
                                                            {
                                                            "itemChoixId": 1342,
                                                            "isReponseOui":true
                                                            }
                                                        ]
					        }';
                        $this->all .= $this->anomalieMontee( $field_MR_2_1_detail );
            $this->all .= '     ]
                            },
                            {
                               "enqueteGrilleId": '.$numeroAtDescente.',
                               "grilleVersionId": 1103,
                               "dateSaisie": '.$dateFinMesure.',
                               "numeroCoquille": "'.$coquille.'",
                               "numeroAdup": null,
							   "pointArretId": 0,
                               "dateValidation": '.$dateFinMesure.',
                               "libelle": "Arrêt au trottoir",
                               "pointArretLibelle": "'.$arretMontee.'",
                               "pointArretDirectionLibelle": "'.$direction.'",
                               "typeObjetMesureCode": "MRE",
                               "itemMobileAndroidList": [{
                                                            "itemId":100000309,
                                                            "saisieLibre":"",
															"nombre":"",
															"commentaire": "'.$gipa_descente.'",
                                                            "isReponseOui":false,
                                                            "itemChoixMobileAndroidList":[
                                                                {
                                                                "itemChoixId": 1343,
                                                                "isReponseOui":true
                                                                }
                                                            ]
					        }';
            
                        $this->all .= $this->anomalieDescente( $field_MR_2_1_detail_bis );
            $this->all .= '     ]
                            }';
           
        return $this->all;
    }


    private function anomalieMontee( $field_MR_2_1_detail )
	{
		if( $field_MR_2_1_detail == 'Aucune gêne' )
			return ',{
						"itemId":100000310,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1344,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail == 'Autre gêne' )
			return ',{
						"itemId":100000310,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1345,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail == 'Stationnement' )
			return ',{
						"itemId":100000310,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1346,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail == 'Travaux' )
			return ',{
						"itemId":100000310,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1347,
							"isReponseOui":true
							}
						]
					}';

		else return '';
	}

	private function anomalieDescente( $field_MR_2_1_detail_bis )
	{
		if( $field_MR_2_1_detail_bis == 'Aucune gêne' )
			return ',{
						"itemId":100000311,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1348,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail_bis == 'Autre gêne' )
			return ',{
						"itemId":100000311,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1349,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail_bis == 'Stationnement' )
			return ',{
						"itemId":100000311,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1350,
							"isReponseOui":true
							}
						]
					}';
		else if( $field_MR_2_1_detail_bis == 'Travaux' )
			return ',{
						"itemId":100000311,
						"saisieLibre":"",
						"nombre":"",
						"isReponseOui":false,
						"itemChoixMobileAndroidList":[
							{
							"itemChoixId": 1351,
							"isReponseOui":true
							}
						]
					}';

		else return '';
	}

    private function resetComma( $text )
	{
		if( substr( $text, -1 ) == "," )
		{	
			$tempBuffer = rtrim( $text , "," );
			$this->all = '';
			$this->all = $tempBuffer;
		}
	}
}