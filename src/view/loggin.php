<?php
require 'E:\Alexandre\Projet web\SeaDevAndSun\vendor\autoload.php';
use Seadev\Dao\Database;
use Seadev\App\Auth;
use Seadev\Dao\DaoException;

if (!empty($_POST)) {
    try {
        $pdo = Database::getConnection();
        $auth = new Auth($pdo);
        $user = $auth->loggin($_POST['email'], $_POST['password']);
        
        if ($user !== null) {
            echo "Connexion réussie pour l'utilisateur : " . $user;
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <div>
        <form action="#" method="post">
            <div>
            <input type="text" name="email" placeholder="Votre email">
            </div>
            <div>
            <input type="password" name="password" placeholder="Mot de passe">
            </div>
            <button type="submit">Se connecter</button>
        </form>
        

        <?= var_dump($_SESSION)?>
    </div>
</body>
</html>