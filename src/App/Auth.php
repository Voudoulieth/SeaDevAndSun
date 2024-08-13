<?php
declare(strict_types=1);
namespace seadev\App;

use Seadev\Metier\Utilisateur;
use PDO;

class Auth {
    
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function user()
    {

    }

    public function loggin(string $username, string $password): ?Utilisateur
{
    // Trouver l'utilisateur correspondant au username
    $query = $this->pdo->prepare('SELECT * FROM Utilisateur WHERE email = :email');
    $query->execute(['email' => $username]);
    
    // Utilisation du fetch() pour obtenir un tableau associatif
    $userData = $query->fetch(PDO::FETCH_ASSOC);
    // var_dump($userData);
    
    if ($userData === false) {
        return null;
    }
    
    // Vérifier si le mot de passe est correct
    if (password_verify($password, $userData['password'])) {
        session_start();
        $_SESSION['auth'] = $userData['id_user'];
        
        // Création d'un objet Utilisateur avec les données
        return new Utilisateur(
            (int)$userData['id_user'],
            $userData['nom'],
            $userData['prenom'],
            $userData['email'],
            $userData['password'],
            (bool)$userData['is_admin']
        );
    }
    
    return null;
}
}
