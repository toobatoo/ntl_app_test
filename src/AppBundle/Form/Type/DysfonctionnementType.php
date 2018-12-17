<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DysfonctionnementType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('matricule', TextType::class, array('label' => false, 'required' => false))
        ->add('modification', TextType::class, array('label' => false, 'required' => false))
        ->add('date', TextType::class, array('label' => false, 'required' => false))
        ->add('ligne', TextType::class, array('label' => false, 'required' => false))
        ->add('typologie', TextType::class, array('label' => false, 'required' => false))
        ->add('signalement', TextType::class, array('label' => false, 'required' => false))
        ->add('reponse_ot', TextType::class, array('label' => false, 'required' => false))
        ->add('min', TextType::class, array('label' => false, 'required' => false))
        ->add('maj', TextType::class, array('label' => false, 'required' => false))
        ->add('pv_decale', TextType::class, array('label' => false, 'required' => false))
        ->add('annulation_grille', TextType::class, array('label' => false, 'required' => false))
        ->add('annulation_pv', TextType::class, array('label' => false, 'required' => false))
        ->add('fact_min', TextType::class, array('label' => false, 'required' => false))
        ->add('fact_maj', TextType::class, array('label' => false, 'required' => false))

        ->add('save', SubmitType::class, array('label'=>'Enregistrer'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    	$resolver->setDefaults( array('data_class'=>'ClientBundle\Entity\Dysfonctionnement') );
    }
}