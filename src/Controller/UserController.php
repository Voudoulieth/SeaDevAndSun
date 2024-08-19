<?php
namespace Seadev\Controller;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use Seadev\App\Auth;

class UserController
{
    private Auth $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function dashboard(): void
    {
        // Afficher la vue du tableau de bord utilisateur
        require __DIR__ . '/../../View/user/dashboardClient.php';
    }
}
