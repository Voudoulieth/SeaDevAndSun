<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

define('BASE_PATH', __DIR__ . '/../src/'); // Chemin vers le répertoire racine du projet

use Seadev\App\Router;
use Seadev\Controller\AuthController;
use Seadev\Controller\AdminController;
use Seadev\Controller\UserController;
use Seadev\Dao\Database;
use Seadev\App\Auth;

// Connexion à la base de données
$pdo = Database::getConnection();
$auth = new Auth($pdo);

// Initialisation du routeur avec les dépendances
$router = new Router($pdo, $auth);

// Initialisation des contrôleurs avec les dépendances
$authController = new AuthController($pdo, $auth);
$adminController = new AdminController($auth);
$userController = new UserController($auth);

// Définition des routes
$router->get('/login', [$authController, 'login']);
$router->post('/login', [$authController, 'login']);
$router->get('/logout', [$authController, 'logout']);
$router->get('/admin/dashboardAdmin', [$adminController, 'dashboard']);
$router->get('/user/dashboardClient', [$userController, 'dashboard']);

// Route de débogage
$router->get('/test-route', function() {
    echo 'La route de test fonctionne.';
});

// Lancement du routeur
$router->run();
