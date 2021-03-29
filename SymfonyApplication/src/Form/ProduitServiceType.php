<?php

namespace App\Form;

use App\Entity\ProduitService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Gregwar\CaptchaBundle\Type\CaptchaType;
class ProduitServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('lien_image',FileType::class, ['label' =>'Image'] )
            ->add('type')
            ->add('prix_unitaire')
            ->add('board', EntityType::class, array(
                "class" => "App\Entity\Board",
                "choice_label" => 'titre',
                "expanded" => false,
                "multiple" => false))
            ->add('categorie', EntityType::class, array(
                "class" => "App\Entity\CategorieProduitService",
                "choice_label" => 'nom',
                "expanded" => false,
                "multiple" => false
            ))
            ->add('captcha', CaptchaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProduitService::class,
        ]);
    }
}
