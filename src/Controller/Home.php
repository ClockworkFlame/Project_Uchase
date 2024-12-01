<?php 

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Pets;
use App\Entity\AnimalType;
use App\Form\AddPet;
use App\Form\SearchPet;

/**
 * Just one controller for this small list app
 */
class Home extends AbstractController
{
    public function index(): Response
    {
        return $this->render('/home.html.twig');
    }

    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        
        // Fetch animal types for use in form builder
        $animalTypes = $entityManager->getRepository(AnimalType::class)->findAll();
        $form = $this->createForm(AddPet::class, new Pets(), ['animalTypes' => $animalTypes]);

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

        return $this->render('/pets/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function search(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Fetch animal types for use in form builder
        $animalTypes = $entityManager->getRepository(AnimalType::class)->findAll();
        $form = $this->createForm(SearchPet::class, null, ['animalTypes' => $animalTypes]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $name = $data["name"];
            $animalType = $data["animaltype"];

            if($name !== null || $animalType !== null) {                
                $items = $entityManager->getRepository(Pets::class)->forSearchForm($name, $animalType);
            } else {
                $items = $entityManager->getRepository(Pets::class)->findAll();
            }
            
            if(is_array($items) && count($items) > 0) {
                return $this->render('/pets/results.html.twig', [
                    'items' => $items,
                    'searched_name' => $name,
                ]);    
            }
            $this->addFlash(
                'notice',
                'No results found.'
            );
            return $this->redirectToRoute('search');
        }

        return $this->render('/pets/search.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
