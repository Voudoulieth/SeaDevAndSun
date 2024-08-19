<?php
// require 'E:\Alexandre\Projet web\SeaDevAndSun\vendor\autoload.php';
// use Seadev\Dao\Database;
// use Seadev\App\Auth;
// use Seadev\Dao\DaoException;

session_start();

// if (!empty($_POST)) {
//     try {
//         $pdo = Database::getConnection();
//         $auth = new Auth($pdo);
//         $user = $auth->loggin($_POST['email'], $_POST['password']);
//         // if($user) {
//         //     header('Location: index.php');
//         // }
        
//         if ($user !== null) {
//             echo "Connexion réussie pour l'utilisateur : " . $user;
//         } else {
//             echo "Nom d'utilisateur ou mot de passe incorrect.";
//         }
//     } catch (Exception $e) {
//         echo "Erreur : " . $e->getMessage();
//     }
// }

// ?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Votre page de connexion"/>
    <link rel="stylesheet" href="/Css/login.css">
    <title>Connexion</title>
</head>
<body>
    <div class="main">
        <div class="main_screen">
            <div class="main_screen_title">
                <h1>SEA DEV AND SUN</h1>
            </div>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="email" class="hidden">Email :</label>
                    <input type="email" name="email" placeholder="Votre email" required>
                </div>
                <div class="input-group">
                    <label for="password" class="hidden">Mot de passe :</label>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="remember">
                    <input type="checkbox" class="remember-me" name="remember"/>
                    <label for="remember" class="remember-me">se souvenir de moi</label>
                </div>
                
                <button type="submit">Se connecter</button>
            </form>
            
        </div>
    </div>
    <footer>
        <p>Designé par Alexandre Clament | Créé par Sea Dev and Sun</p>
    </footer>
</body>
</html>
