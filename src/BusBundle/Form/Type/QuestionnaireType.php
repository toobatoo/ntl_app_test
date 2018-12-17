<?php

namespace BusBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

Class QuestionnaireType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder->add('id', HiddenType::class)
        ->add('date', HiddenType::class)
        ->add('nuit', TextType::class, array('label' => false))
    	->add('coquille', TextType::class, array('label' => false))
    	->add('arretMontee', TextType::class, array('label' => false))
        ->add('arretDescente', TextType::class, array('label' => false))
        ->add('dateDebutMesure', TextType::class, array('label' => false))
    	->add('heureMontee', TextType::class, array('label' => false))
        ->add('dateFinMesure', TextType::class, array('label' => false))
    	->add('mrHDescente', TextType::class, array('label' => false))
    	->add('direction', TextType::class, array('label' => false))
    	->add('bivIndice', TextType::class, array('label' => false, 'required' => false))
    	->add('bivIndiceDetail', TextType::class, array('label' => false, 'required' => false))
    	->add('bivDirection', TextType::class, array('label' => false, 'required' => false))
    	->add('bivDirectionDetail', TextType::class, array('label' => false, 'required' => false))
    	->add('bivAttente', TextType::class, array('label' => false, 'required' => false))
    	->add('bivAttenteDetail', TextType::class, array('label' => false, 'required' => false))
        ->add('Q21', TextType::class, array('label' => false))
        ->add('Q22', TextType::class, array('label' => false))
        ->add('Q23', TextType::class, array('label' => false))
        ->add('Q24', TextType::class, array('label' => false))
        ->add('Q31', TextType::class, array('label' => false))
        ->add('Q31Detail', TextType::class, array('label' => false, 'required' => false))
        ->add('Q32', TextType::class, array('label' => false))
        ->add('Q32Detail', TextType::class, array('label' => false, 'required' => false))
        ->add('Q33', TextType::class, array('label' => false))
        ->add('Q33Detail', TextType::class, array('label' => false, 'required' => false))
        ->add('Q34', TextType::class, array('label' => false))
        ->add('Q34Detail', TextType::class, array('label' => false, 'required' => false))
        ->add('Q41', TextType::class, array('label' => false))
        ->add('Q41Detail', TextType::class, array('label' => false, 'required' => false))
        ->add('Q42', TextType::class, array('label' => false))
        ->add('Q42Detail', TextType::class, array('label' => false, 'required' => false))
        ->add('Q43', TextType::class, array('label' => false))
        ->add('Q43Detail', TextType::class, array('label' => false, 'required' => false))
        ->add('Q51', TextType::class, array('label' => false))
        ->add('Q52', TextType::class, array('label' => false))
        ->add('Q53', TextType::class, array('label' => false))
        ->add('Q54', TextType::class, array('label' => false))
        ->add('Q55', TextType::class, array('label' => false))
        ->add('Q56', TextType::class, array('label' => false))
        ->add('Q57', TextType::class, array('label' => false))
        ->add('Q58', TextType::class, array('label' => false))
        ->add('Q61', TextType::class, array('label' => false))
        ->add('Q62', TextType::class, array('label' => false))
        ->add('Q63', TextType::class, array('label' => false))
        ->add('Q64', TextType::class, array('label' => false))
        ->add('Q65', TextType::class, array('label' => false))
        ->add('Q66', TextType::class, array('label' => false))
        ->add('Q67', TextType::class, array('label' => false))
        ->add('Q68', TextType::class, array('label' => false))
        ->add('Q69', TextType::class, array('label' => false))
        ->add('Q610', TextType::class, array('label' => false))
        ->add('Q611', TextType::class, array('label' => false))
        ->add('Q612', TextType::class, array('label' => false))
        ->add('Q613', TextType::class, array('label' => false))
        ->add('Q614', TextType::class, array('label' => false))
        ->add('Q71', TextType::class, array('label' => false))
        ->add('MR21', TextType::class, array('label' => false, 'required' => false))
        ->add('MR21Detail', TextType::class, array('label' => false, 'required' => false))
        ->add('MR21Bis', TextType::class, array('label' => false, 'required' => false))
        ->add('MR21DetailBis', TextType::class, array('label' => false, 'required' => false))
        ->add('MR31', TextType::class, array('label' => false))
        ->add('MR32', TextType::class, array('label' => false))
        ->add('MR41', TextType::class, array('label' => false))
        ->add('MR42', TextType::class, array('label' => false))
        ->add('MR51', TextType::class, array('label' => false))
        ->add('MR52', TextType::class, array('label' => false))
        ->add('MR53', TextType::class, array('label' => false))
        ->add('MR54', TextType::class, array('label' => false))
        ->add('MR55', TextType::class, array('label' => false))
        ->add('MR61', TextType::class, array('label' => false))
        ->add('MR62', TextType::class, array('label' => false))
        ->add('MR63', TextType::class, array('label' => false))
        ->add('MR64', TextType::class, array('label' => false))
        ->add('MR71', TextType::class, array('label' => false))
        ->add('MR72', TextType::class, array('label' => false))
        ->add('MR73', TextType::class, array('label' => false))
        ->add('MR74', TextType::class, array('label' => false))
        ->add('MR75', TextType::class, array('label' => false))
        ->add('MR76', TextType::class, array('label' => false))
        ->add('MR77', TextType::class, array('label' => false))
        ->add('obs', TextareaType::class, array('label' => false, 'required' => false))
        ->add('gipaMontee', TextType::class, array('label' => false, 'required' => false))
        ->add('gipaDescente', TextType::class, array('label' => false, 'required' => false))

        ->add('valid', HiddenType::class)
        ->add('json', HiddenType::class)
        ->add('ticket', CheckboxType::class, array('label' => false, 'required' => false))

    	->add('save', SubmitType::class, array('label'=>'Enregistrer'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    	$resolver->setDefaults( array('data_class'=>'AppBundle\Entity\Questionnaire') );
    }
}