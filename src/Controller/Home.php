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
    public function index(EntityManagerInterface $entityManager): Response
    {
        var_dump($product);

        // phpinfo();exit;
        return $this->render('/pets/add_pet.html.twig');
    }

    public function search(EntityManagerInterface $entityManager): Response
    {
        $product = $entityManager->getRepository(Pets::class)->find(1);
    }
}
