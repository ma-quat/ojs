<?php

namespace Ojs\JournalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SubmissionChecklistType
 * @package Ojs\JournalBundle\Form\Type
 */
class SubmissionChecklistType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', 'text', ['label' => 'submission_checklist.label'])
            ->add('detail', 'purified_textarea', [
                'required' => false,
                'label' => 'submission_checklist.detail',
                'attr' => array('class' => ' form-control wysihtml5'),
            ])
            ->add(
                'locale',
                'choice',
                [
                    'choices' => $options['languages'],
                    'label' => 'languages'
                ]
            )
            ->add('visible', 'checkbox', [
                'required' => false,
                'label' => 'submission_checklist.visible'
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Ojs\JournalBundle\Entity\SubmissionChecklist',
                'cascade_validation' => true,
                'languages' => array(
                    array('tr' => 'Türkçe'),
                    array('en' => 'English'),
                ),
                'attr' => [
                    'class' => 'form-validate',
                ],
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ojs_journalbundle_submissionchecklist';
    }
}
