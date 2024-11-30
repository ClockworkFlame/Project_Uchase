<?php 

namespace App\Controller;

use App\Controller\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as Response;
use Doctrine\DBAL\DriverManager;

/**
 * Just one controller for this small list app
 */
class Home extends BaseController
{
    public function index(): Response
    {
        $connectionParams = [
            'dbname' => 'tutorial',
            'user' => 'admin',
            'password' => 'admin',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ];
        $conn = DriverManager::getConnection($connectionParams);
        var_dump($conn);

        // phpinfo();exit;
        return $this->render('/pets/add_pet.html.twig');
    }

    public function search(): Response
    {

    }
}
