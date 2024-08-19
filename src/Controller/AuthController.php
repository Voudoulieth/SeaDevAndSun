<?php
namespace Seadev\Controller;

use Seadev\Metier\Utilisateur;
use Seadev\App\Auth;
use PDO;

class AuthController {

    private PDO $pdo;
    private Auth $auth;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->auth = new Auth($pdo);
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->auth->loggin($email, $password);

            if ($user) {
                // Redirection en fonction du rôle
                if ($user->isAdmin()) {
                    header('Location: /admin/dashboardAdmin');
                } else {
                    header('Location: /user/dashboardClient');
                }
                exit();
            } else {
                // Afficher la vue de connexion avec un message d'erreur
                $error = "Identifiants incorrects.";
                require '../views/login.php';
            }
        } else {
            // Afficher le formulaire de connexion
            require '../views/login.php';
        }
    }

    public function logout(): void
    {
        $this->auth->logout();
        header('Location: /login');
        exit();
    }
}
