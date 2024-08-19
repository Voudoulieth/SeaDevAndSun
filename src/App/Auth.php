<?php
declare(strict_types=1);
namespace Seadev\App;

use Seadev\Metier\Utilisateur;
use PDO;

class Auth {
    
    private PDO $pdo;

    public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

    private function ensureSessionStarted(): void
        {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

    public function user(): ?Utilisateur
        {
            $this->ensureSessionStarted();

            $id = $_SESSION['auth'] ?? null;
            if ($id === null) {
                return null;
            }

            $query = $this->pdo->prepare('SELECT * FROM Utilisateur WHERE id_utilisateur = ?');
            $query->execute([$id]);
            $userData = $query->fetch(PDO::FETCH_ASSOC);

            if ($userData === false) {
                return null;
            }

            // Retourne un objet Utilisateur
            return new Utilisateur(
                (int)$userData['id_utilisateur'],
                $userData['nom'],
                $userData['prenom'],
                $userData['email'],
                $userData['password'],
                (bool)$userData['is_admin']
            );
        }

    public function loggin(string $username, string $password): ?Utilisateur
        {
            $query = $this->pdo->prepare('SELECT * FROM Utilisateur WHERE email = :email');
            $query->execute(['email' => $username]);

            $userData = $query->fetch(PDO::FETCH_ASSOC);

            if ($userData === false) {
                return null;
            }

            if (password_verify($password, $userData['password'])) {
                $this->ensureSessionStarted();
                $_SESSION['auth'] = $userData['id_utilisateur'];

                return new Utilisateur(
                    (int)$userData['id_utilisateur'],
                    $userData['nom'],
                    $userData['prenom'],
                    $userData['email'],
                    $userData['password'],
                    (bool)$userData['is_admin']
                );
            }

            return null;
        }

    public function requireAdmin(): void
        {
            $user = $this->user();

            if ($user === null || !$user->isAdmin()) {
                header('Location: /auth/login');
                exit();
            }
        }

    public function logout(): void
        {
            $this->ensureSessionStarted();
            session_unset();
            session_destroy();
        }
}
