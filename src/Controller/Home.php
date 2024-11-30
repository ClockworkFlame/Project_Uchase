<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Pets;
use App\Entity\AnimalType as AnimalType;
use App\Form\Pets as Pets_Form;

/**
 * Just one controller for this small list app
 */
class Home extends AbstractController
{
    public function index(): Response
    {
        return $this->render('/pets/home.html.twig');
    }

    public function add(EntityManagerInterface $entityManager): Response
    {
        // creates a task object and initializes some data for this example
        $pet = new Pets();
        // $pet->setName('Write a pet name');
        // $pet->setName('Write a pet name');
        // $pet->setDueDate(new \DateTimeImmutable('tomorrow'));

        // Fetch animal types for use in form builder
        $animalTypes = $entityManager
        ->getRepository(AnimalType::class)
        ->getTypes();
        $animalTypes = array_column($animalTypes, 'name');

        $form = $this->createForm(Pets_Form::class, $pet, ['animalTypes' => $animalTypes]);

        return $this->render('/pets/add_pet.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function search(EntityManagerInterface $entityManager): Response
    {
        // $product = $entityManager->getRepository(Pets::class)->find(1);
        // var_dump($product->getName());
    }
}
