<?php
namespace Seadev\Controller;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use Seadev\App\Auth;

class AdminController
{
    private Auth $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function dashboard(): void
    {
        // Vérifier si l'utilisateur est admin
        $this->auth->requireAdmin();

        // Afficher la vue du tableau de bord admin
        require __DIR__ . '/../../View/admin/dashboardAdmin.php';

    }
}
