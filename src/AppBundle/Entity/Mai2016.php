<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mai2016
 *
 * @ORM\Table(name="mai_2016")
 * @ORM\Entity
 */
class Mai2016
{
    /**
     * @var string
     *
     * @ORM\Column(name="grille", type="string", length=50, nullable=true)
     */
    private $grille;

    /**
     * @var integer
     *
     * @ORM\Column(name="enq", type="integer", nullable=false)
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


}

