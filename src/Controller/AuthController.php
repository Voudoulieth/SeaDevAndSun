<?php
namespace Seadev\Controller;

use Seadev\App\Auth;
use PDO;

class AuthController
{
    private PDO $pdo;
    private Auth $auth;

    public function __construct(PDO $pdo, Auth $auth)
    {
        $this->pdo = $pdo;
        $this->auth = $auth;
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->auth->login($email, $password);

            if ($user) {
                if ($user->isAdmin()) {
                    header('Location: /admin/dashboardAdmin');
                } else {
                    header('Location: /user/dashboardClient');
                }
                exit();
            } else {
                $error = "Identifiants incorrects.";
                require __DIR__ . '/../../View/login.php';
            }
        } else {
            require __DIR__ . '/../../View/login.php';
        }
    }

    public function logout(): void
    {
        $this->auth->logout();
        header('Location: /login');
        exit();
    }
}
