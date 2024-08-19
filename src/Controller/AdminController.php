<?php
namespace Seadev\Controller;

use Seadev\App\Auth;

class AdminController {

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
        require '../views/admin/dashboard.php';
    }
}
