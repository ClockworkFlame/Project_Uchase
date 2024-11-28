<?php 

namespace App\Controller;

use App\Controller\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as Response;

class Home extends BaseController
{
    public function index(): Response
    {
        // phpinfo();exit;
        return $this->render('/pets/add_pet.html.twig');
    }

    public function search(): Response
    {

    }
}
