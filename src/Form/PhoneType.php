<?php

namespace App\Form;

use App\Entity\Phone;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', null, [
                'placeholder' => '-- Choisir --',
                'label' => 'Marque'
            ])
            ->add('model', null, [
                'label' => 'Modèle'
            ])
            ->add('description', CKEditorType::class, [
                'label' => 'Description du téléphone'
            ])
            ->add('limitStock', null, [
                'label' => 'Stock Limite'
            ])
            ->add('creationYear', null, [
                'label' => 'Année de création'
            ])
            ->add('isActive', null, [
                'label' => 'Ce modèle de téléphone est actif',
            ])
        ;

        // if not new
        if ($builder->getData()->getId()) {
            $builder->add('imeis', CollectionType::class, [
                'label' => false,
                'entry_type' => IMEIType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' => false,
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Phone::class,
        ]);
    }
}
