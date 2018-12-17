<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questionnaire
 *
 * @ORM\Table(name="questionnaire_s")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionnaireRepository")
 */
class Questionnaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="grille", type="string", length=50, nullable=true)
     */
    private $grille;

    /**
     * @var string
     *
     * @ORM\Column(name="enq", type="string", length=25, nullable=false)
     */
    private $enq;

    /**
     * @var string
     *
     * @ORM\Column(name="num_planning", type="string", length=20, nullable=false)
     */
    private $numPlanning;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut_mesure", type="string", length=30, nullable=true)
     */
    private $dateDebutMesure;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin_mesure", type="string", length=30, nullable=true)
     */
    private $dateFinMesure;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=15, nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="nuit", type="string", length=2, nullable=true)
     */
    private $nuit;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne", type="string", length=10, nullable=true)
     */
    private $ligne;

    /**
     * @var string
     *
     * @ORM\Column(name="coquille", type="string", length=10, nullable=true)
     */
    private $coquille;

    /**
     * @var string
     *
     * @ORM\Column(name="arret_montee", type="string", length=255, nullable=true)
     */
    private $arretMontee;

    /**
     * @var string
     *
     * @ORM\Column(name="arret_descente", type="string", length=255, nullable=true)
     */
    private $arretDescente;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_montee", type="string", length=10, nullable=true)
     */
    private $heureMontee;

    /**
     * @var string
     *
     * @ORM\Column(name="direction", type="string", length=255, nullable=true)
     */
    private $direction;

    /**
     * @var string
     *
     * @ORM\Column(name="biv_indice", type="text", length=65535, nullable=true)
     */
    private $bivIndice;

    /**
     * @var string
     *
     * @ORM\Column(name="biv_indice_detail", type="text", length=65535, nullable=true)
     */
    private $bivIndiceDetail;

    /**
     * @var string
     *
     * @ORM\Column(name="biv_direction", type="text", length=65535, nullable=true)
     */
    private $bivDirection;

    /**
     * @var string
     *
     * @ORM\Column(name="biv_direction_detail", type="text", length=65535, nullable=true)
     */
    private $bivDirectionDetail;

    /**
     * @var string
     *
     * @ORM\Column(name="biv_attente", type="text", length=65535, nullable=true)
     */
    private $bivAttente;

    /**
     * @var string
     *
     * @ORM\Column(name="biv_attente_detail", type="text", length=65535, nullable=true)
     */
    private $bivAttenteDetail;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_1", type="text", length=65535, nullable=true)
     */
    private $q21;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_2", type="text", length=65535, nullable=true)
     */
    private $q22;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_3", type="text", length=65535, nullable=true)
     */
    private $q23;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_4", type="text", length=65535, nullable=true)
     */
    private $q24;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_1", type="text", length=65535, nullable=true)
     */
    private $q31;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_1_detail", type="text", length=65535, nullable=true)
     */
    private $q31Detail;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_2", type="text", length=65535, nullable=true)
     */
    private $q32;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_2_detail", type="text", length=65535, nullable=true)
     */
    private $q32Detail;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_3", type="text", length=65535, nullable=true)
     */
    private $q33;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_3_detail", type="text", length=65535, nullable=true)
     */
    private $q33Detail;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_4", type="text", length=65535, nullable=true)
     */
    private $q34;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_4_detail", type="text", length=65535, nullable=true)
     */
    private $q34Detail;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_1", type="text", length=65535, nullable=true)
     */
    private $q41;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_1_detail", type="text", length=65535, nullable=true)
     */
    private $q41Detail;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_2", type="text", length=65535, nullable=true)
     */
    private $q42;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_2_detail", type="text", length=65535, nullable=true)
     */
    private $q42Detail;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_3", type="text", length=65535, nullable=true)
     */
    private $q43;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_3_detail", type="text", length=65535, nullable=true)
     */
    private $q43Detail;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_5_1", type="text", length=65535, nullable=true)
     */
    private $q51;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_5_2", type="text", length=65535, nullable=true)
     */
    private $q52;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_5_3", type="text", length=65535, nullable=true)
     */
    private $q53;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_5_4", type="text", length=65535, nullable=true)
     */
    private $q54;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_5_5", type="text", length=65535, nullable=true)
     */
    private $q55;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_5_6", type="text", length=65535, nullable=true)
     */
    private $q56;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_5_7", type="text", length=65535, nullable=true)
     */
    private $q57;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_5_8", type="text", length=65535, nullable=true)
     */
    private $q58;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_1", type="text", length=65535, nullable=true)
     */
    private $q61;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_2", type="text", length=65535, nullable=true)
     */
    private $q62;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_3", type="text", length=65535, nullable=true)
     */
    private $q63;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_4", type="text", length=65535, nullable=true)
     */
    private $q64;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_5", type="text", length=65535, nullable=true)
     */
    private $q65;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_6", type="text", length=65535, nullable=true)
     */
    private $q66;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_7", type="text", length=65535, nullable=true)
     */
    private $q67;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_8", type="text", length=65535, nullable=true)
     */
    private $q68;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_9", type="text", length=65535, nullable=true)
     */
    private $q69;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_10", type="text", length=65535, nullable=true)
     */
    private $q610;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_11", type="text", length=65535, nullable=true)
     */
    private $q611;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_12", type="text", length=65535, nullable=true)
     */
    private $q612;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_13", type="text", length=65535, nullable=true)
     */
    private $q613;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_6_14", type="text", length=65535, nullable=true)
     */
    private $q614;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_7_1", type="text", length=65535, nullable=true)
     */
    private $q71;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_2_1", type="text", length=65535, nullable=true)
     */
    private $mr21;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_2_1_detail", type="string", length=50, nullable=true)
     */
    private $mr21Detail;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_2_1_bis", type="text", length=65535, nullable=true)
     */
    private $mr21Bis;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_2_1_detail_bis", type="string", length=50, nullable=true)
     */
    private $mr21DetailBis;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_3_1", type="text", length=65535, nullable=true)
     */
    private $mr31;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_3_2", type="text", length=65535, nullable=true)
     */
    private $mr32;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_4_1", type="text", length=65535, nullable=true)
     */
    private $mr41;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_4_2", type="text", length=65535, nullable=true)
     */
    private $mr42;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_5_1", type="text", length=65535, nullable=true)
     */
    private $mr51;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_5_2", type="text", length=65535, nullable=true)
     */
    private $mr52;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_5_3", type="text", length=65535, nullable=true)
     */
    private $mr53;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_5_4", type="text", length=65535, nullable=true)
     */
    private $mr54;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_5_5", type="text", length=65535, nullable=true)
     */
    private $mr55;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_6_1", type="text", length=65535, nullable=true)
     */
    private $mr61;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_6_2", type="text", length=65535, nullable=true)
     */
    private $mr62;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_6_3", type="text", length=65535, nullable=true)
     */
    private $mr63;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_6_4", type="text", length=65535, nullable=true)
     */
    private $mr64;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_7_1", type="text", length=65535, nullable=true)
     */
    private $mr71;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_7_2", type="text", length=65535, nullable=true)
     */
    private $mr72;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_7_3", type="text", length=65535, nullable=true)
     */
    private $mr73;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_7_4", type="text", length=65535, nullable=true)
     */
    private $mr74;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_7_5", type="text", length=65535, nullable=true)
     */
    private $mr75;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_7_6", type="text", length=65535, nullable=true)
     */
    private $mr76;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_7_7", type="text", length=65535, nullable=true)
     */
    private $mr77;

    /**
     * @var string
     *
     * @ORM\Column(name="MR_H_descente", type="string", length=30, nullable=true)
     */
    private $mrHDescente;

    /**
     * @var string
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var string
     *
     * @ORM\Column(name="valid", type="string", length=10, nullable=true)
     */

    private $valid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

     /**
     * @var integer
     *
     * @ORM\Column(name="json", type="integer")
     */
    private $json;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ticket", type="boolean")
     */
    private $ticket;

    /**
     * @var string
     *
     * @ORM\Column(name="generated_date", type="string", length=35)
     */
    private $generatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="gipa_montee", type="text", length=10, nullable=true)
     */
    private $gipaMontee;

    /**
     * @var string
     *
     * @ORM\Column(name="gipa_descente", type="text", length=10, nullable=true)
     */
    private $gipaDescente;


    /**
     * Set generatedDate
     *
     * @param string $generatedDate
     *
     * @return Questionnaire
     */
    public function setGeneratedDate($generatedDate)
    {
        $this->generatedDate = $generatedDate;

        return $this;
    }

    /**
     * Get generatedDate
     *
     * @return string
     */
    public function getGeneratedDate()
    {
        return $this->generatedDate;
    }


    /**
     * Set grille
     *
     * @param string $grille
     *
     * @return Questionnaire
     */
    public function setGrille($grille)
    {
        $this->grille = $grille;

        return $this;
    }

    /**
     * Get grille
     *
     * @return string
     */
    public function getGrille()
    {
        return $this->grille;
    }

    /**
     * Set enq
     *
     * @param string $enq
     *
     * @return Questionnaire
     */
    public function setEnq($enq)
    {
        $this->enq = $enq;

        return $this;
    }

    /**
     * Get enq
     *
     * @return string
     */
    public function getEnq()
    {
        return $this->enq;
    }

    /**
     * Set numPlanning
     *
     * @param string $numPlanning
     *
     * @return Questionnaire
     */
    public function setNumPlanning($numPlanning)
    {
        $this->numPlanning = $numPlanning;

        return $this;
    }

    /**
     * Get numPlanning
     *
     * @return string
     */
    public function getNumPlanning()
    {
        return $this->numPlanning;
    }

    /**
     * Set dateDebutMesure
     *
     * @param string $dateDebutMesure
     *
     * @return Questionnaire
     */
    public function setDateDebutMesure($dateDebutMesure)
    {
        $this->dateDebutMesure = $dateDebutMesure;

        return $this;
    }

    /**
     * Get dateDebutMesure
     *
     * @return string
     */
    public function getDateDebutMesure()
    {
        return $this->dateDebutMesure;
    }

    /**
     * Set dateFinMesure
     *
     * @param string $dateFinMesure
     *
     * @return Questionnaire
     */
    public function setDateFinMesure($dateFinMesure)
    {
        $this->dateFinMesure = $dateFinMesure;

        return $this;
    }

    /**
     * Get dateFinMesure
     *
     * @return string
     */
    public function getDateFinMesure()
    {
        return $this->dateFinMesure;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Questionnaire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set nuit
     *
     * @param string $nuit
     *
     * @return Questionnaire
     */
    public function setNuit($nuit)
    {
        $this->nuit = $nuit;

        return $this;
    }

    /**
     * Get nuit
     *
     * @return string
     */
    public function getNuit()
    {
        return $this->nuit;
    }

    /**
     * Set ligne
     *
     * @param string $ligne
     *
     * @return Questionnaire
     */
    public function setLigne($ligne)
    {
        $this->ligne = $ligne;

        return $this;
    }

    /**
     * Get ligne
     *
     * @return string
     */
    public function getLigne()
    {
        return $this->ligne;
    }

    /**
     * Set coquille
     *
     * @param string $coquille
     *
     * @return Questionnaire
     */
    public function setCoquille($coquille)
    {
        $this->coquille = $coquille;

        return $this;
    }

    /**
     * Get coquille
     *
     * @return string
     */
    public function getCoquille()
    {
        return $this->coquille;
    }

    /**
     * Set arretMontee
     *
     * @param string $arretMontee
     *
     * @return Questionnaire
     */
    public function setArretMontee($arretMontee)
    {
        $this->arretMontee = $arretMontee;

        return $this;
    }

    /**
     * Get arretMontee
     *
     * @return string
     */
    public function getArretMontee()
    {
        return $this->arretMontee;
    }

    /**
     * Set arretDescente
     *
     * @param string $arretDescente
     *
     * @return Questionnaire
     */
    public function setArretDescente($arretDescente)
    {
        $this->arretDescente = $arretDescente;

        return $this;
    }

    /**
     * Get arretDescente
     *
     * @return string
     */
    public function getArretDescente()
    {
        return $this->arretDescente;
    }

    /**
     * Set heureMontee
     *
     * @param string $heureMontee
     *
     * @return Questionnaire
     */
    public function setHeureMontee($heureMontee)
    {
        $this->heureMontee = $heureMontee;

        return $this;
    }

    /**
     * Get heureMontee
     *
     * @return string
     */
    public function getHeureMontee()
    {
        return $this->heureMontee;
    }

    /**
     * Set direction
     *
     * @param string $direction
     *
     * @return Questionnaire
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set bivIndice
     *
     * @param string $bivIndice
     *
     * @return Questionnaire
     */
    public function setBivIndice($bivIndice)
    {
        $this->bivIndice = $bivIndice;

        return $this;
    }

    /**
     * Get bivIndice
     *
     * @return string
     */
    public function getBivIndice()
    {
        return $this->bivIndice;
    }

    /**
     * Set bivIndiceDetail
     *
     * @param string $bivIndiceDetail
     *
     * @return Questionnaire
     */
    public function setBivIndiceDetail($bivIndiceDetail)
    {
        $this->bivIndiceDetail = $bivIndiceDetail;

        return $this;
    }

    /**
     * Get bivIndiceDetail
     *
     * @return string
     */
    public function getBivIndiceDetail()
    {
        return $this->bivIndiceDetail;
    }

    /**
     * Set bivDirection
     *
     * @param string $bivDirection
     *
     * @return Questionnaire
     */
    public function setBivDirection($bivDirection)
    {
        $this->bivDirection = $bivDirection;

        return $this;
    }

    /**
     * Get bivDirection
     *
     * @return string
     */
    public function getBivDirection()
    {
        return $this->bivDirection;
    }

    /**
     * Set bivDirectionDetail
     *
     * @param string $bivDirectionDetail
     *
     * @return Questionnaire
     */
    public function setBivDirectionDetail($bivDirectionDetail)
    {
        $this->bivDirectionDetail = $bivDirectionDetail;

        return $this;
    }

    /**
     * Get bivDirectionDetail
     *
     * @return string
     */
    public function getBivDirectionDetail()
    {
        return $this->bivDirectionDetail;
    }

    /**
     * Set bivAttente
     *
     * @param string $bivAttente
     *
     * @return Questionnaire
     */
    public function setBivAttente($bivAttente)
    {
        $this->bivAttente = $bivAttente;

        return $this;
    }

    /**
     * Get bivAttente
     *
     * @return string
     */
    public function getBivAttente()
    {
        return $this->bivAttente;
    }

    /**
     * Set bivAttenteDetail
     *
     * @param string $bivAttenteDetail
     *
     * @return Questionnaire
     */
    public function setBivAttenteDetail($bivAttenteDetail)
    {
        $this->bivAttenteDetail = $bivAttenteDetail;

        return $this;
    }

    /**
     * Get bivAttenteDetail
     *
     * @return string
     */
    public function getBivAttenteDetail()
    {
        return $this->bivAttenteDetail;
    }

    /**
     * Set q21
     *
     * @param string $q21
     *
     * @return Questionnaire
     */
    public function setQ21($q21)
    {
        $this->q21 = $q21;

        return $this;
    }

    /**
     * Get q21
     *
     * @return string
     */
    public function getQ21()
    {
        return $this->q21;
    }

    /**
     * Set q22
     *
     * @param string $q22
     *
     * @return Questionnaire
     */
    public function setQ22($q22)
    {
        $this->q22 = $q22;

        return $this;
    }

    /**
     * Get q22
     *
     * @return string
     */
    public function getQ22()
    {
        return $this->q22;
    }

    /**
     * Set q23
     *
     * @param string $q23
     *
     * @return Questionnaire
     */
    public function setQ23($q23)
    {
        $this->q23 = $q23;

        return $this;
    }

    /**
     * Get q23
     *
     * @return string
     */
    public function getQ23()
    {
        return $this->q23;
    }

    /**
     * Set q24
     *
     * @param string $q24
     *
     * @return Questionnaire
     */
    public function setQ24($q24)
    {
        $this->q24 = $q24;

        return $this;
    }

    /**
     * Get q24
     *
     * @return string
     */
    public function getQ24()
    {
        return $this->q24;
    }

    /**
     * Set q31
     *
     * @param string $q31
     *
     * @return Questionnaire
     */
    public function setQ31($q31)
    {
        $this->q31 = $q31;

        return $this;
    }

    /**
     * Get q31
     *
     * @return string
     */
    public function getQ31()
    {
        return $this->q31;
    }

    /**
     * Set q31Detail
     *
     * @param string $q31Detail
     *
     * @return Questionnaire
     */
    public function setQ31Detail($q31Detail)
    {
        $this->q31Detail = $q31Detail;

        return $this;
    }

    /**
     * Get q31Detail
     *
     * @return string
     */
    public function getQ31Detail()
    {
        return $this->q31Detail;
    }

    /**
     * Set q32
     *
     * @param string $q32
     *
     * @return Questionnaire
     */
    public function setQ32($q32)
    {
        $this->q32 = $q32;

        return $this;
    }

    /**
     * Get q32
     *
     * @return string
     */
    public function getQ32()
    {
        return $this->q32;
    }

    /**
     * Set q32Detail
     *
     * @param string $q32Detail
     *
     * @return Questionnaire
     */
    public function setQ32Detail($q32Detail)
    {
        $this->q32Detail = $q32Detail;

        return $this;
    }

    /**
     * Get q32Detail
     *
     * @return string
     */
    public function getQ32Detail()
    {
        return $this->q32Detail;
    }

    /**
     * Set q33
     *
     * @param string $q33
     *
     * @return Questionnaire
     */
    public function setQ33($q33)
    {
        $this->q33 = $q33;

        return $this;
    }

    /**
     * Get q33
     *
     * @return string
     */
    public function getQ33()
    {
        return $this->q33;
    }

    /**
     * Set q33Detail
     *
     * @param string $q33Detail
     *
     * @return Questionnaire
     */
    public function setQ33Detail($q33Detail)
    {
        $this->q33Detail = $q33Detail;

        return $this;
    }

    /**
     * Get q33Detail
     *
     * @return string
     */
    public function getQ33Detail()
    {
        return $this->q33Detail;
    }

    /**
     * Set q34
     *
     * @param string $q34
     *
     * @return Questionnaire
     */
    public function setQ34($q34)
    {
        $this->q34 = $q34;

        return $this;
    }

    /**
     * Get q34
     *
     * @return string
     */
    public function getQ34()
    {
        return $this->q34;
    }

    /**
     * Set q34Detail
     *
     * @param string $q34Detail
     *
     * @return Questionnaire
     */
    public function setQ34Detail($q34Detail)
    {
        $this->q34Detail = $q34Detail;

        return $this;
    }

    /**
     * Get q34Detail
     *
     * @return string
     */
    public function getQ34Detail()
    {
        return $this->q34Detail;
    }

    /**
     * Set q41
     *
     * @param string $q41
     *
     * @return Questionnaire
     */
    public function setQ41($q41)
    {
        $this->q41 = $q41;

        return $this;
    }

    /**
     * Get q41
     *
     * @return string
     */
    public function getQ41()
    {
        return $this->q41;
    }

    /**
     * Set q41Detail
     *
     * @param string $q41Detail
     *
     * @return Questionnaire
     */
    public function setQ41Detail($q41Detail)
    {
        $this->q41Detail = $q41Detail;

        return $this;
    }

    /**
     * Get q41Detail
     *
     * @return string
     */
    public function getQ41Detail()
    {
        return $this->q41Detail;
    }

    /**
     * Set q42
     *
     * @param string $q42
     *
     * @return Questionnaire
     */
    public function setQ42($q42)
    {
        $this->q42 = $q42;

        return $this;
    }

    /**
     * Get q42
     *
     * @return string
     */
    public function getQ42()
    {
        return $this->q42;
    }

    /**
     * Set q42Detail
     *
     * @param string $q42Detail
     *
     * @return Questionnaire
     */
    public function setQ42Detail($q42Detail)
    {
        $this->q42Detail = $q42Detail;

        return $this;
    }

    /**
     * Get q42Detail
     *
     * @return string
     */
    public function getQ42Detail()
    {
        return $this->q42Detail;
    }

    /**
     * Set q43
     *
     * @param string $q43
     *
     * @return Questionnaire
     */
    public function setQ43($q43)
    {
        $this->q43 = $q43;

        return $this;
    }

    /**
     * Get q43
     *
     * @return string
     */
    public function getQ43()
    {
        return $this->q43;
    }

    /**
     * Set q43Detail
     *
     * @param string $q43Detail
     *
     * @return Questionnaire
     */
    public function setQ43Detail($q43Detail)
    {
        $this->q43Detail = $q43Detail;

        return $this;
    }

    /**
     * Get q43Detail
     *
     * @return string
     */
    public function getQ43Detail()
    {
        return $this->q43Detail;
    }

    /**
     * Set q51
     *
     * @param string $q51
     *
     * @return Questionnaire
     */
    public function setQ51($q51)
    {
        $this->q51 = $q51;

        return $this;
    }

    /**
     * Get q51
     *
     * @return string
     */
    public function getQ51()
    {
        return $this->q51;
    }

    /**
     * Set q52
     *
     * @param string $q52
     *
     * @return Questionnaire
     */
    public function setQ52($q52)
    {
        $this->q52 = $q52;

        return $this;
    }

    /**
     * Get q52
     *
     * @return string
     */
    public function getQ52()
    {
        return $this->q52;
    }

    /**
     * Set q53
     *
     * @param string $q53
     *
     * @return Questionnaire
     */
    public function setQ53($q53)
    {
        $this->q53 = $q53;

        return $this;
    }

    /**
     * Get q53
     *
     * @return string
     */
    public function getQ53()
    {
        return $this->q53;
    }

    /**
     * Set q54
     *
     * @param string $q54
     *
     * @return Questionnaire
     */
    public function setQ54($q54)
    {
        $this->q54 = $q54;

        return $this;
    }

    /**
     * Get q54
     *
     * @return string
     */
    public function getQ54()
    {
        return $this->q54;
    }

    /**
     * Set q55
     *
     * @param string $q55
     *
     * @return Questionnaire
     */
    public function setQ55($q55)
    {
        $this->q55 = $q55;

        return $this;
    }

    /**
     * Get q55
     *
     * @return string
     */
    public function getQ55()
    {
        return $this->q55;
    }

    /**
     * Set q56
     *
     * @param string $q56
     *
     * @return Questionnaire
     */
    public function setQ56($q56)
    {
        $this->q56 = $q56;

        return $this;
    }

    /**
     * Get q56
     *
     * @return string
     */
    public function getQ56()
    {
        return $this->q56;
    }

    /**
     * Set q57
     *
     * @param string $q57
     *
     * @return Questionnaire
     */
    public function setQ57($q57)
    {
        $this->q57 = $q57;

        return $this;
    }

    /**
     * Get q57
     *
     * @return string
     */
    public function getQ57()
    {
        return $this->q57;
    }

    /**
     * Set q58
     *
     * @param string $q58
     *
     * @return Questionnaire
     */
    public function setQ58($q58)
    {
        $this->q58 = $q58;

        return $this;
    }

    /**
     * Get q58
     *
     * @return string
     */
    public function getQ58()
    {
        return $this->q58;
    }

    /**
     * Set q61
     *
     * @param string $q61
     *
     * @return Questionnaire
     */
    public function setQ61($q61)
    {
        $this->q61 = $q61;

        return $this;
    }

    /**
     * Get q61
     *
     * @return string
     */
    public function getQ61()
    {
        return $this->q61;
    }

    /**
     * Set q62
     *
     * @param string $q62
     *
     * @return Questionnaire
     */
    public function setQ62($q62)
    {
        $this->q62 = $q62;

        return $this;
    }

    /**
     * Get q62
     *
     * @return string
     */
    public function getQ62()
    {
        return $this->q62;
    }

    /**
     * Set q63
     *
     * @param string $q63
     *
     * @return Questionnaire
     */
    public function setQ63($q63)
    {
        $this->q63 = $q63;

        return $this;
    }

    /**
     * Get q63
     *
     * @return string
     */
    public function getQ63()
    {
        return $this->q63;
    }

    /**
     * Set q64
     *
     * @param string $q64
     *
     * @return Questionnaire
     */
    public function setQ64($q64)
    {
        $this->q64 = $q64;

        return $this;
    }

    /**
     * Get q64
     *
     * @return string
     */
    public function getQ64()
    {
        return $this->q64;
    }

    /**
     * Set q65
     *
     * @param string $q65
     *
     * @return Questionnaire
     */
    public function setQ65($q65)
    {
        $this->q65 = $q65;

        return $this;
    }

    /**
     * Get q65
     *
     * @return string
     */
    public function getQ65()
    {
        return $this->q65;
    }

    /**
     * Set q66
     *
     * @param string $q66
     *
     * @return Questionnaire
     */
    public function setQ66($q66)
    {
        $this->q66 = $q66;

        return $this;
    }

    /**
     * Get q66
     *
     * @return string
     */
    public function getQ66()
    {
        return $this->q66;
    }

    /**
     * Set q67
     *
     * @param string $q67
     *
     * @return Questionnaire
     */
    public function setQ67($q67)
    {
        $this->q67 = $q67;

        return $this;
    }

    /**
     * Get q67
     *
     * @return string
     */
    public function getQ67()
    {
        return $this->q67;
    }

    /**
     * Set q68
     *
     * @param string $q68
     *
     * @return Questionnaire
     */
    public function setQ68($q68)
    {
        $this->q68 = $q68;

        return $this;
    }

    /**
     * Get q68
     *
     * @return string
     */
    public function getQ68()
    {
        return $this->q68;
    }

    /**
     * Set q69
     *
     * @param string $q69
     *
     * @return Questionnaire
     */
    public function setQ69($q69)
    {
        $this->q69 = $q69;

        return $this;
    }

    /**
     * Get q69
     *
     * @return string
     */
    public function getQ69()
    {
        return $this->q69;
    }

    /**
     * Set q610
     *
     * @param string $q610
     *
     * @return Questionnaire
     */
    public function setQ610($q610)
    {
        $this->q610 = $q610;

        return $this;
    }

    /**
     * Get q610
     *
     * @return string
     */
    public function getQ610()
    {
        return $this->q610;
    }

    /**
     * Set q611
     *
     * @param string $q611
     *
     * @return Questionnaire
     */
    public function setQ611($q611)
    {
        $this->q611 = $q611;

        return $this;
    }

    /**
     * Get q611
     *
     * @return string
     */
    public function getQ611()
    {
        return $this->q611;
    }

    /**
     * Set q612
     *
     * @param string $q612
     *
     * @return Questionnaire
     */
    public function setQ612($q612)
    {
        $this->q612 = $q612;

        return $this;
    }

    /**
     * Get q612
     *
     * @return string
     */
    public function getQ612()
    {
        return $this->q612;
    }

    /**
     * Set q613
     *
     * @param string $q613
     *
     * @return Questionnaire
     */
    public function setQ613($q613)
    {
        $this->q613 = $q613;

        return $this;
    }

    /**
     * Get q613
     *
     * @return string
     */
    public function getQ613()
    {
        return $this->q613;
    }

    /**
     * Set q614
     *
     * @param string $q614
     *
     * @return Questionnaire
     */
    public function setQ614($q614)
    {
        $this->q614 = $q614;

        return $this;
    }

    /**
     * Get q614
     *
     * @return string
     */
    public function getQ614()
    {
        return $this->q614;
    }

    /**
     * Set q71
     *
     * @param string $q71
     *
     * @return Questionnaire
     */
    public function setQ71($q71)
    {
        $this->q71 = $q71;

        return $this;
    }

    /**
     * Get q71
     *
     * @return string
     */
    public function getQ71()
    {
        return $this->q71;
    }

    /**
     * Set mr21
     *
     * @param string $mr21
     *
     * @return Questionnaire
     */
    public function setMr21($mr21)
    {
        $this->mr21 = $mr21;

        return $this;
    }

    /**
     * Get mr21
     *
     * @return string
     */
    public function getMr21()
    {
        return $this->mr21;
    }

    /**
     * Set mr21Detail
     *
     * @param string $mr21Detail
     *
     * @return Questionnaire
     */
    public function setMr21Detail($mr21Detail)
    {
        $this->mr21Detail = $mr21Detail;

        return $this;
    }

    /**
     * Get mr21Detail
     *
     * @return string
     */
    public function getMr21Detail()
    {
        return $this->mr21Detail;
    }

    /**
     * Set mr21Bis
     *
     * @param string $mr21Bis
     *
     * @return Questionnaire
     */
    public function setMr21Bis($mr21Bis)
    {
        $this->mr21Bis = $mr21Bis;

        return $this;
    }

    /**
     * Get mr21Bis
     *
     * @return string
     */
    public function getMr21Bis()
    {
        return $this->mr21Bis;
    }

    /**
     * Set mr21DetailBis
     *
     * @param string $mr21DetailBis
     *
     * @return Questionnaire
     */
    public function setMr21DetailBis($mr21DetailBis)
    {
        $this->mr21DetailBis = $mr21DetailBis;

        return $this;
    }

    /**
     * Get mr21DetailBis
     *
     * @return string
     */
    public function getMr21DetailBis()
    {
        return $this->mr21DetailBis;
    }

    /**
     * Set mr31
     *
     * @param string $mr31
     *
     * @return Questionnaire
     */
    public function setMr31($mr31)
    {
        $this->mr31 = $mr31;

        return $this;
    }

    /**
     * Get mr31
     *
     * @return string
     */
    public function getMr31()
    {
        return $this->mr31;
    }

    /**
     * Set mr32
     *
     * @param string $mr32
     *
     * @return Questionnaire
     */
    public function setMr32($mr32)
    {
        $this->mr32 = $mr32;

        return $this;
    }

    /**
     * Get mr32
     *
     * @return string
     */
    public function getMr32()
    {
        return $this->mr32;
    }

    /**
     * Set mr41
     *
     * @param string $mr41
     *
     * @return Questionnaire
     */
    public function setMr41($mr41)
    {
        $this->mr41 = $mr41;

        return $this;
    }

    /**
     * Get mr41
     *
     * @return string
     */
    public function getMr41()
    {
        return $this->mr41;
    }

    /**
     * Set mr42
     *
     * @param string $mr42
     *
     * @return Questionnaire
     */
    public function setMr42($mr42)
    {
        $this->mr42 = $mr42;

        return $this;
    }

    /**
     * Get mr42
     *
     * @return string
     */
    public function getMr42()
    {
        return $this->mr42;
    }

    /**
     * Set mr51
     *
     * @param string $mr51
     *
     * @return Questionnaire
     */
    public function setMr51($mr51)
    {
        $this->mr51 = $mr51;

        return $this;
    }

    /**
     * Get mr51
     *
     * @return string
     */
    public function getMr51()
    {
        return $this->mr51;
    }

    /**
     * Set mr52
     *
     * @param string $mr52
     *
     * @return Questionnaire
     */
    public function setMr52($mr52)
    {
        $this->mr52 = $mr52;

        return $this;
    }

    /**
     * Get mr52
     *
     * @return string
     */
    public function getMr52()
    {
        return $this->mr52;
    }

    /**
     * Set mr53
     *
     * @param string $mr53
     *
     * @return Questionnaire
     */
    public function setMr53($mr53)
    {
        $this->mr53 = $mr53;

        return $this;
    }

    /**
     * Get mr53
     *
     * @return string
     */
    public function getMr53()
    {
        return $this->mr53;
    }

    /**
     * Set mr54
     *
     * @param string $mr54
     *
     * @return Questionnaire
     */
    public function setMr54($mr54)
    {
        $this->mr54 = $mr54;

        return $this;
    }

    /**
     * Get mr54
     *
     * @return string
     */
    public function getMr54()
    {
        return $this->mr54;
    }

    /**
     * Set mr55
     *
     * @param string $mr55
     *
     * @return Questionnaire
     */
    public function setMr55($mr55)
    {
        $this->mr55 = $mr55;

        return $this;
    }

    /**
     * Get mr55
     *
     * @return string
     */
    public function getMr55()
    {
        return $this->mr55;
    }

    /**
     * Set mr61
     *
     * @param string $mr61
     *
     * @return Questionnaire
     */
    public function setMr61($mr61)
    {
        $this->mr61 = $mr61;

        return $this;
    }

    /**
     * Get mr61
     *
     * @return string
     */
    public function getMr61()
    {
        return $this->mr61;
    }

    /**
     * Set mr62
     *
     * @param string $mr62
     *
     * @return Questionnaire
     */
    public function setMr62($mr62)
    {
        $this->mr62 = $mr62;

        return $this;
    }

    /**
     * Get mr62
     *
     * @return string
     */
    public function getMr62()
    {
        return $this->mr62;
    }

    /**
     * Set mr63
     *
     * @param string $mr63
     *
     * @return Questionnaire
     */
    public function setMr63($mr63)
    {
        $this->mr63 = $mr63;

        return $this;
    }

    /**
     * Get mr63
     *
     * @return string
     */
    public function getMr63()
    {
        return $this->mr63;
    }

    /**
     * Set mr64
     *
     * @param string $mr64
     *
     * @return Questionnaire
     */
    public function setMr64($mr64)
    {
        $this->mr64 = $mr64;

        return $this;
    }

    /**
     * Get mr64
     *
     * @return string
     */
    public function getMr64()
    {
        return $this->mr64;
    }

    /**
     * Set mr71
     *
     * @param string $mr71
     *
     * @return Questionnaire
     */
    public function setMr71($mr71)
    {
        $this->mr71 = $mr71;

        return $this;
    }

    /**
     * Get mr71
     *
     * @return string
     */
    public function getMr71()
    {
        return $this->mr71;
    }

    /**
     * Set mr72
     *
     * @param string $mr72
     *
     * @return Questionnaire
     */
    public function setMr72($mr72)
    {
        $this->mr72 = $mr72;

        return $this;
    }

    /**
     * Get mr72
     *
     * @return string
     */
    public function getMr72()
    {
        return $this->mr72;
    }

    /**
     * Set mr73
     *
     * @param string $mr73
     *
     * @return Questionnaire
     */
    public function setMr73($mr73)
    {
        $this->mr73 = $mr73;

        return $this;
    }

    /**
     * Get mr73
     *
     * @return string
     */
    public function getMr73()
    {
        return $this->mr73;
    }

    /**
     * Set mr74
     *
     * @param string $mr74
     *
     * @return Questionnaire
     */
    public function setMr74($mr74)
    {
        $this->mr74 = $mr74;

        return $this;
    }

    /**
     * Get mr74
     *
     * @return string
     */
    public function getMr74()
    {
        return $this->mr74;
    }

    /**
     * Set mr75
     *
     * @param string $mr75
     *
     * @return Questionnaire
     */
    public function setMr75($mr75)
    {
        $this->mr75 = $mr75;

        return $this;
    }

    /**
     * Get mr75
     *
     * @return string
     */
    public function getMr75()
    {
        return $this->mr75;
    }

    /**
     * Set mr76
     *
     * @param string $mr76
     *
     * @return Questionnaire
     */
    public function setMr76($mr76)
    {
        $this->mr76 = $mr76;

        return $this;
    }

    /**
     * Get mr76
     *
     * @return string
     */
    public function getMr76()
    {
        return $this->mr76;
    }

    /**
     * Set mr77
     *
     * @param string $mr77
     *
     * @return Questionnaire
     */
    public function setMr77($mr77)
    {
        $this->mr77 = $mr77;

        return $this;
    }

    /**
     * Get mr77
     *
     * @return string
     */
    public function getMr77()
    {
        return $this->mr77;
    }

    /**
     * Set mrHDescente
     *
     * @param string $mrHDescente
     *
     * @return Questionnaire
     */
    public function setMrHDescente($mrHDescente)
    {
        $this->mrHDescente = $mrHDescente;

        return $this;
    }

    /**
     * Get mrHDescente
     *
     * @return string
     */
    public function getMrHDescente()
    {
        return $this->mrHDescente;
    }

    /**
     * Set obs
     *
     * @param string $obs
     *
     * @return Questionnaire
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get obs
     *
     * @return string
     */
    public function getObs()
    {
        return $this->obs;
    }


    /**
     * Set valid
     *
     * @param string $valid
     *
     * @return Questionnaire
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return string
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Questionnaire
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set json
     *
     * @param integer $json
     *
     * @return Questionnaire
     */
    public function setJson($json)
    {
        $this->json = $json;

        return $this;
    }

    /**
     * Get json
     *
     * @return integer
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * Set ticket
     *
     * @param boolean $enq
     *
     * @return Questionnaire
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return boolean
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Set gipaMontee
     *
     * @param string $gipaMontee
     *
     * @return Questionnaire
     */
    public function setGipaMontee($gipaMontee)
    {
        $this->gipaMontee = $gipaMontee;

        return $this;
    }

    /**
     * Get gipaMontee
     *
     * @return string
     */
    public function getGipaMontee()
    {
        return $this->gipaMontee;
    }

    /**
     * Set gipaDescente
     *
     * @param string $gipaDescente
     *
     * @return Questionnaire
     */
    public function setGipaDescente($gipaDescente)
    {
        $this->gipaDescente = $gipaDescente;

        return $this;
    }

    /**
     * Get gipaDescente
     *
     * @return string
     */
    public function getGipaDescente()
    {
        return $this->gipaDescente;
    }
}
