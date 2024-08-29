<?php

namespace Seadev\Controller;

use Seadev\App\Auth;
use Seadev\Dao\Database;
use PDO;

class AdminController
{
    private Auth $auth;
    private PDO $pdo;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        $this->pdo = Database::getConnection();
    }

    public function dashboard(): void
    {
        // Vérifier si l'utilisateur est admin
        $this->auth->requireAdmin();

        // Afficher la vue du tableau de bord admin
        require __DIR__ . '/../View/admin/dashboardAdmin.php';

    }

    public function comptes(): void
    {
        $this->auth->requireAdmin();

        // $csrfToken = bin2hex(random_bytes(32));
        // $_SESSION['csrf_token'] = $csrfToken;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $postedToken = $_POST['csrf_token'] ?? '';
            // if ($postedToken !== $csrfToken) {
            //     die('Token CSRF invalide.');
            // }
    
            $action = $_POST['action'] ?? '';

            switch ($action) {
                case 'create':
                    $this->createUser();
                    break;
                case 'update':
                    $this->updateUser();
                    break;
                case 'delete':
                    $this->deleteUser();
                    break;
                default:
                    echo "Action non reconnue.";
                    break;
            }
        }

        $pdo = Database::getConnection();
        $query = $pdo->query('SELECT * FROM Utilisateur');
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        $viewFile = __DIR__ . '/../View/admin/listeCompte.php';
        include $viewFile;
    }


    private function createUser(): void
    {
        // Validation CSRF
        // if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        //     die("Invalid CSRF token");
        // }

        // Validation et filtrage des données
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $isAdmin = isset($_POST['is_admin']) ? true : false;

        if (!$email) {
            echo "Adresse email invalide.";
            return;
        }

        try {
            $pdo = Database::getConnection();
            $pdo->query("SELECT setval(pg_get_serial_sequence('utilisateur', 'id_utilisateur'), COALESCE(MAX(id_utilisateur), 1)) FROM utilisateur");

            // Hashage du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = $pdo->prepare('INSERT INTO Utilisateur (nom, prenom, email, password, is_admin) VALUES (:nom, :prenom, :email, :password, :is_admin)');
            $query->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $hashedPassword,
                'is_admin' => $isAdmin
            ]);

            echo "Utilisateur ajouté avec succès.";
        } catch (\Exception $e) {
            error_log($e->getMessage()); // Enregistrement de l'erreur dans un fichier log
            echo "Une erreur est survenue. Veuillez réessayer plus tard.";
        }
    }


    private function updateUser(): void
    {
        // Validation CSRF
        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            die("Invalid CSRF token");
        }

        // Validation et filtrage des données
        $id = (int)$_POST['id']; // On s'assure que l'ID est bien un entier
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $isAdmin = isset($_POST['is_admin']) ? true : false;

        if (!$email) {
            echo "Adresse email invalide.";
            return;
        }

        try {
            $pdo = Database::getConnection();

            $query = $pdo->prepare('UPDATE Utilisateur SET nom = :nom, prenom = :prenom, email = :email, is_admin = :is_admin WHERE id_utilisateur = :id');
            $query->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'is_admin' => $isAdmin
            ]);

            echo "Utilisateur mis à jour avec succès.";
        } catch (\Exception $e) {
            error_log($e->getMessage()); // Enregistrement de l'erreur dans un fichier log
            echo "Une erreur est survenue. Veuillez réessayer plus tard.";
        }
    }


    private function deleteUser(): void
    {
        try {
            $pdo = Database::getConnection();
            $id = $_POST['id'];

            $query = $pdo->prepare('DELETE FROM Utilisateur WHERE id_utilisateur = :id');
            $query->execute([
                'id' => $id
            ]);

            echo "Utilisateur supprimé avec succès.";
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
