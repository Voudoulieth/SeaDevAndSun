<?php
require 'E:\Alexandre\Projet web\SeaDevAndSun\vendor\autoload.php';
use Seadev\Dao\Database;
use Seadev\App\Auth;


$pdo = Database::getConnection();
$auth = new Auth($pdo);
$user = $auth->user();
if($user === null || $user->is_admin !== true){
    header('Location: login.php?forbid=1');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur votre espace Administrateur</title>
</head>
<body>
    <div>Menu</div>
    <div>Dashboard</div>
    <div>Carte</div>
    <div>Paperasse</div>
</body>
</html> 