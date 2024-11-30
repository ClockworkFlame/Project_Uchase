<?php 

namespace App\Controller\Ajax;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Home extends AbstractController
{
    public function index()
    {
        // Do I even do AJAX??? I guess Ill see how I feel.
        return new Response (
            'test'
        );
    }
}
