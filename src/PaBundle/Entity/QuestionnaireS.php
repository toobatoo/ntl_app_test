<?php


namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionnaireS
 *
 * @ORM\Table(name="questionnaire_s")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\QuestionnaireSRepository")
 */
class QuestionnaireS
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_global", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGlobal;

    /**
     * @var string
     *
     * @ORM\Column(name="enqueteur", type="string", nullable=true)
     */
    private $enqueteur;

    /**
     * @var string
     *
     * @ORM\Column(name="generated_date", type="string", nullable=true)
     */
    private $generatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=10, nullable=true)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne", type="string", length=10, nullable=true)
     */
    private $ligne;

    /**
     * @var string
     *
     * @ORM\Column(name="gipa", type="string", length=10, nullable=true)
     */
    private $gipa;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=20, nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=20, nullable=true)
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_valid", type="string", length=20, nullable=true)
     */
    private $heureValid;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_1_1", type="text", length=65535, nullable=true)
     */
    private $q11;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_1_2", type="text", length=65535, nullable=true)
     */
    private $q12;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_1_3", type="text", length=65535, nullable=true)
     */
    private $q13;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_1_4", type="text", length=65535, nullable=true)
     */
    private $q14;

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
     * @ORM\Column(name="Q_2_5", type="text", length=65535, nullable=true)
     */
    private $q25;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_1", type="text", length=65535, nullable=true)
     */
    private $q31;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_2", type="text", length=65535, nullable=true)
     */
    private $q32;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_3", type="text", length=65535, nullable=true)
     */
    private $q33;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_4", type="text", length=65535, nullable=true)
     */
    private $q34;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_5", type="text", length=65535, nullable=true)
     */
    private $q35;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_1", type="text", length=65535, nullable=true)
     */
    private $q41;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_1_obs", type="text", length=65535, nullable=true)
     */
    private $q41Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_2", type="text", length=65535, nullable=true)
     */
    private $q42;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_2_obs", type="text", length=65535, nullable=true)
     */
    private $q42Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_3", type="text", length=65535, nullable=true)
     */
    private $q43;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_3_obs", type="text", length=65535, nullable=true)
     */
    private $q43Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_4", type="text", length=65535, nullable=true)
     */
    private $q44;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_4_obs", type="text", length=65535, nullable=true)
     */
    private $q44Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_5", type="text", length=65535, nullable=true)
     */
    private $q45;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_5_obs", type="text", length=65535, nullable=true)
     */
    private $q45Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_6", type="text", length=65535, nullable=true)
     */
    private $q46;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_6_obs", type="text", length=65535, nullable=true)
     */
    private $q46Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_7", type="text", length=65535, nullable=true)
     */
    private $q47;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_7_obs", type="text", length=65535, nullable=true)
     */
    private $q47Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_8", type="text", length=65535, nullable=true)
     */
    private $q48;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_8_obs", type="text", length=65535, nullable=true)
     */
    private $q48Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_9", type="text", length=65535, nullable=true)
     */
    private $q49;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_9_obs", type="text", length=65535, nullable=true)
     */
    private $q49Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var integer
     *
     * @ORM\Column(name="valid", type="integer", nullable=false)
     */
    private $valid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="inopine", type="integer", nullable=false)
     */
    private $inopine = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="generated", type="integer", nullable=false)
     */
    private $json = '0';



    /**
     * Get idGlobal
     *
     * @return string
     */
    public function getIdGlobal()
    {
        return $this->idGlobal;
    }

    /**
     * Set enqueteur
     *
     * @param string $enqueteur
     *
     * @return QuestionnaireS
     */
    public function setEnqueteur($enqueteur)
    {
        $this->enqueteur = $enqueteur;

        return $this;
    }

    /**
     * Get enqueteur
     *
     * @return string
     */
    public function getEnqueteur()
    {
        return $this->enqueteur;
    }

    /**
     * Set generatedDate
     *
     * @param string $generatedDate
     *
     * @return QuestionnaireS
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
     * Set zone
     *
     * @param string $zone
     *
     * @return QuestionnaireS
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set ligne
     *
     * @param string $ligne
     *
     * @return QuestionnaireS
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
     * Set gipa
     *
     * @param string $gipa
     *
     * @return QuestionnaireS
     */
    public function setGipa($gipa)
    {
        $this->gipa = $gipa;

        return $this;
    }

    /**
     * Get gipa
     *
     * @return string
     */
    public function getGipa()
    {
        return $this->gipa;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return QuestionnaireS
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
     * Set heure
     *
     * @param string $heure
     *
     * @return QuestionnaireS
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return string
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set heureValid
     *
     * @param string $heureValid
     *
     * @return QuestionnaireS
     */
    public function setHeureValid($heureValid)
    {
        $this->heureValid = $heureValid;

        return $this;
    }

    /**
     * Get heureValid
     *
     * @return string
     */
    public function getHeureValid()
    {
        return $this->heureValid;
    }

    /**
     * Set q11
     *
     * @param string $q11
     *
     * @return QuestionnaireS
     */
    public function setQ11($q11)
    {
        $this->q11 = $q11;

        return $this;
    }

    /**
     * Get q11
     *
     * @return string
     */
    public function getQ11()
    {
        return $this->q11;
    }

    /**
     * Set q12
     *
     * @param string $q12
     *
     * @return QuestionnaireS
     */
    public function setQ12($q12)
    {
        $this->q12 = $q12;

        return $this;
    }

    /**
     * Get q12
     *
     * @return string
     */
    public function getQ12()
    {
        return $this->q12;
    }

    /**
     * Set q13
     *
     * @param string $q13
     *
     * @return QuestionnaireS
     */
    public function setQ13($q13)
    {
        $this->q13 = $q13;

        return $this;
    }

    /**
     * Get q13
     *
     * @return string
     */
    public function getQ13()
    {
        return $this->q13;
    }

    /**
     * Set q14
     *
     * @param string $q14
     *
     * @return QuestionnaireS
     */
    public function setQ14($q14)
    {
        $this->q14 = $q14;

        return $this;
    }

    /**
     * Get q14
     *
     * @return string
     */
    public function getQ14()
    {
        return $this->q14;
    }

    /**
     * Set q21
     *
     * @param string $q21
     *
     * @return QuestionnaireS
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
     * @return QuestionnaireS
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
     * @return QuestionnaireS
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
     * @return QuestionnaireS
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
     * Set q25
     *
     * @param string $q25
     *
     * @return QuestionnaireS
     */
    public function setQ25($q25)
    {
        $this->q25 = $q25;

        return $this;
    }

    /**
     * Get q25
     *
     * @return string
     */
    public function getQ25()
    {
        return $this->q25;
    }

    /**
     * Set q31
     *
     * @param string $q31
     *
     * @return QuestionnaireS
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
     * Set q32
     *
     * @param string $q32
     *
     * @return QuestionnaireS
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
     * Set q33
     *
     * @param string $q33
     *
     * @return QuestionnaireS
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
     * Set q34
     *
     * @param string $q34
     *
     * @return QuestionnaireS
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
     * Set q35
     *
     * @param string $q35
     *
     * @return QuestionnaireS
     */
    public function setQ35($q35)
    {
        $this->q35 = $q35;

        return $this;
    }

    /**
     * Get q35
     *
     * @return string
     */
    public function getQ35()
    {
        return $this->q35;
    }

    /**
     * Set q41
     *
     * @param string $q41
     *
     * @return QuestionnaireS
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
     * Set q41Obs
     *
     * @param string $q41Obs
     *
     * @return QuestionnaireS
     */
    public function setQ41Obs($q41Obs)
    {
        $this->q41Obs = $q41Obs;

        return $this;
    }

    /**
     * Get q41Obs
     *
     * @return string
     */
    public function getQ41Obs()
    {
        return $this->q41Obs;
    }

    /**
     * Set q42
     *
     * @param string $q42
     *
     * @return QuestionnaireS
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
     * Set q42Obs
     *
     * @param string $q42Obs
     *
     * @return QuestionnaireS
     */
    public function setQ42Obs($q42Obs)
    {
        $this->q42Obs = $q42Obs;

        return $this;
    }

    /**
     * Get q42Obs
     *
     * @return string
     */
    public function getQ42Obs()
    {
        return $this->q42Obs;
    }

    /**
     * Set q43
     *
     * @param string $q43
     *
     * @return QuestionnaireS
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
     * Set q43Obs
     *
     * @param string $q43Obs
     *
     * @return QuestionnaireS
     */
    public function setQ43Obs($q43Obs)
    {
        $this->q43Obs = $q43Obs;

        return $this;
    }

    /**
     * Get q43Obs
     *
     * @return string
     */
    public function getQ43Obs()
    {
        return $this->q43Obs;
    }

    /**
     * Set q44
     *
     * @param string $q44
     *
     * @return QuestionnaireS
     */
    public function setQ44($q44)
    {
        $this->q44 = $q44;

        return $this;
    }

    /**
     * Get q44
     *
     * @return string
     */
    public function getQ44()
    {
        return $this->q44;
    }

    /**
     * Set q44Obs
     *
     * @param string $q44Obs
     *
     * @return QuestionnaireS
     */
    public function setQ44Obs($q44Obs)
    {
        $this->q44Obs = $q44Obs;

        return $this;
    }

    /**
     * Get q44Obs
     *
     * @return string
     */
    public function getQ44Obs()
    {
        return $this->q44Obs;
    }

    /**
     * Set q45
     *
     * @param string $q45
     *
     * @return QuestionnaireS
     */
    public function setQ45($q45)
    {
        $this->q45 = $q45;

        return $this;
    }

    /**
     * Get q45
     *
     * @return string
     */
    public function getQ45()
    {
        return $this->q45;
    }

    /**
     * Set q45Obs
     *
     * @param string $q45Obs
     *
     * @return QuestionnaireS
     */
    public function setQ45Obs($q45Obs)
    {
        $this->q45Obs = $q45Obs;

        return $this;
    }

    /**
     * Get q45Obs
     *
     * @return string
     */
    public function getQ45Obs()
    {
        return $this->q45Obs;
    }

    /**
     * Set q46
     *
     * @param string $q46
     *
     * @return QuestionnaireS
     */
    public function setQ46($q46)
    {
        $this->q46 = $q46;

        return $this;
    }

    /**
     * Get q46
     *
     * @return string
     */
    public function getQ46()
    {
        return $this->q46;
    }

    /**
     * Set q46Obs
     *
     * @param string $q46Obs
     *
     * @return QuestionnaireS
     */
    public function setQ46Obs($q46Obs)
    {
        $this->q46Obs = $q46Obs;

        return $this;
    }

    /**
     * Get q46Obs
     *
     * @return string
     */
    public function getQ46Obs()
    {
        return $this->q46Obs;
    }

    /**
     * Set q47
     *
     * @param string $q47
     *
     * @return QuestionnaireS
     */
    public function setQ47($q47)
    {
        $this->q47 = $q47;

        return $this;
    }

    /**
     * Get q47
     *
     * @return string
     */
    public function getQ47()
    {
        return $this->q47;
    }

    /**
     * Set q47Obs
     *
     * @param string $q47Obs
     *
     * @return QuestionnaireS
     */
    public function setQ47Obs($q47Obs)
    {
        $this->q47Obs = $q47Obs;

        return $this;
    }

    /**
     * Get q47Obs
     *
     * @return string
     */
    public function getQ47Obs()
    {
        return $this->q47Obs;
    }

    /**
     * Set q48
     *
     * @param string $q48
     *
     * @return QuestionnaireS
     */
    public function setQ48($q48)
    {
        $this->q48 = $q48;

        return $this;
    }

    /**
     * Get q48
     *
     * @return string
     */
    public function getQ48()
    {
        return $this->q48;
    }

    /**
     * Set q48Obs
     *
     * @param string $q48Obs
     *
     * @return QuestionnaireS
     */
    public function setQ48Obs($q48Obs)
    {
        $this->q48Obs = $q48Obs;

        return $this;
    }

    /**
     * Get q48Obs
     *
     * @return string
     */
    public function getQ48Obs()
    {
        return $this->q48Obs;
    }

    /**
     * Set q49
     *
     * @param string $q49
     *
     * @return QuestionnaireS
     */
    public function setQ49($q49)
    {
        $this->q49 = $q49;

        return $this;
    }

    /**
     * Get q49
     *
     * @return string
     */
    public function getQ49()
    {
        return $this->q49;
    }

    /**
     * Set q49Obs
     *
     * @param string $q49Obs
     *
     * @return QuestionnaireS
     */
    public function setQ49Obs($q49Obs)
    {
        $this->q49Obs = $q49Obs;

        return $this;
    }

    /**
     * Get q49Obs
     *
     * @return string
     */
    public function getQ49Obs()
    {
        return $this->q49Obs;
    }

    /**
     * Set obs
     *
     * @param string $obs
     *
     * @return QuestionnaireS
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
     * @param integer $valid
     *
     * @return QuestionnaireS
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return integer
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set inopine
     *
     * @param integer $inopine
     *
     * @return QuestionnaireS
     */
    public function setInopine($inopine)
    {
        $this->inopine = $inopine;

        return $this;
    }

    /**
     * Get inopine
     *
     * @return integer
     */
    public function getInopine()
    {
        return $this->inopine;
    }

    /**
     * Set json
     *
     * @param integer $json
     *
     * @return QuestionnaireS
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
}
