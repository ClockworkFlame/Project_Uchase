<?php 

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $pet = new Pets();

        // Fetch animal types for use in form builder
        $animalTypes = $entityManager->getRepository(AnimalType::class)->findAll();
        $form = $this->createForm(Pets_Form::class, $pet, ['animalTypes' => $animalTypes]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $pet = $form->getData();

            try{
                $entityManager->persist($pet);
                $entityManager->flush();
            }
            catch(\Exception $e){
                $this->addFlash(
                    'warning',
                    'Something went wrong!'
                );
                error_log($e->getMessage());
                return $this->redirectToRoute('add');
            }

            $this->addFlash(
                'success',
                'Pet was submitted!'
            );
            
            return $this->redirectToRoute('home');
        }

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
