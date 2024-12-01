<?php 
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\AnimalType as AnimalType;

class Pets extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->animalTypes = $options['animalTypes'];

        $builder
            ->add('name', TextType::class, array(
                'attr' => ['maxlength' => 45],
            ))
            ->add('info', TextType::class, array(
                'required' => false,
                'attr' => ['maxlength' => 255]
                ))
            ->add('animaltype', EntityType::class, [
                'class' => AnimalType::class,
                'choices' => $this->animalTypes,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('save', SubmitType::class, ['label' => 'Submit']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'animalTypes' => [],
            'validation_groups' => ['no-validation'],
        ]);
    }
}

