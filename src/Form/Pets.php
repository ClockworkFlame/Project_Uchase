<?php 
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class Pets extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->animalTypes = $options['animalTypes'];

        $builder
            ->add('name', TextType::class)
            ->add('info', TextType::class)
            ->add('animaltype', ChoiceType::class, [
                'choices' => array_combine($this->animalTypes,$this->animalTypes) // Duplicates values as keys
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'animalTypes' => [],
        ]);
    }
}

