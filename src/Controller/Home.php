<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Pets;

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
    }

    public function search(EntityManagerInterface $entityManager): Response
    {
        // $product = $entityManager->getRepository(Pets::class)->find(1);
        // var_dump($product->getName());
    }
}
