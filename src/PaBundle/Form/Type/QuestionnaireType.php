<?php
namespace PaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


Class QuestionnaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('enqueteur', TextType::class, array('label' => false))
        ->add('zone', TextType::class, array('label' => false, 'required' => false))
        ->add('ligne', TextType::class, array('label' => false, 'required' => false))
        ->add('gipa', TextType::class, array('label' => false, 'required' => false))
        ->add('date', TextType::class, array('label' => false, 'required' => false))
        ->add('heure', TextType::class, array('label' => false, 'required' => false))
        ->add('heureValid', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_1_1', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_1_2', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_1_3', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_1_4', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_2_1', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_2_2', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_2_3', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_2_4', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_2_5', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_3_1', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_3_2', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_3_3', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_3_4', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_3_5', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_1', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_1_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_2', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_2_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_3', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_3_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_4', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_4_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_5', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_5_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_6', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_6_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_7', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_7_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_8', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_8_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_9', TextType::class, array('label' => false, 'required' => false))
        ->add('Q_4_9_obs', TextType::class, array('label' => false, 'required' => false))
        ->add('obs', TextareaType::class, array('label' => false, 'required' => false))
        ->add('valid', HiddenType::class)
        ->add('save', SubmitType::class, array('label'=>'Enregistrer'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    	$resolver->setDefaults( array('data_class'=>'PaBundle\Entity\QuestionnaireS') );
    }
}