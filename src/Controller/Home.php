<?php 

namespace App\Controller;

use App\Controller\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Home extends BaseController
{
    public function index()
    {
        return new Response (
            'test'
        );
    }
}
