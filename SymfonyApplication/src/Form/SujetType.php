<?php

namespace App\Form;

use App\Entity\Sujet;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\File;


class SujetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',
            TextareaType::class,
                ['attr' => ['placeholder' => 'Tapez le titre ici ']]
            )

            ->add('description',TextareaType::class,['required'=>false,
                'attr' => ['placeholder' => 'Tapez la description ici ']])

            ->add('lien_image', FileType::class, [
                'required'=>false,
                    ('data_class')=>null]
            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sujet::class,
        ]);
    }
}
