<?php
require 'E:\Alexandre\Projet web\SeaDevAndSun\vendor\autoload.php';
use Seadev\Dao\Database;
use Seadev\App\Auth;


$pdo = Database::getConnection();
$auth = new Auth($pdo);
$user = $auth->user();
if($user === null || $user->isAdmin() !== true){
    header('Location: login.php?forbid=1');
    exit();
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/Css/dashboard.css">
    <link rel="stylesheet" href="/Assets/Css/header.css">
    <link rel="stylesheet" href="/Assets/Css/navbarAdmin.css">
    <title>Bienvenue sur votre espace Administrateur</title>
</head>
<body>
    <?php include './src/View/header.php' ?>
    <?php include 'navbarAdmin.php' ?>
</body>
</html> 