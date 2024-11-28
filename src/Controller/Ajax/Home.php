<?php 

namespace App\Controller\Ajax;

use App\Controller\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Home extends BaseController
{
    public function index()
    {
        // Do I even do AJAX??? I guess Ill see how I feel.
        return new Response (
            'test'
        );
    }
}
