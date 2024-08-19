<?php
namespace Seadev\App;

use Seadev\App\Auth;
use Seadev\Controller\AuthController;
use Seadev\Controller\AdminController;
use Seadev\Controller\UserController;
use PDO;


class Router
{
    private $routes = [];
    private $pdo;
    private $auth;

    public function __construct(PDO $pdo, Auth $auth)
    {
        $this->pdo = $pdo;
        $this->auth = $auth;
    }

    public function get($path, $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler)
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            [$controller, $action] = $handler;

            // Instancier le contrôleur avec les dépendances appropriées
            if ($controller === AuthController::class) {
                $controllerInstance = new $controller($this->pdo, $this->auth);
            } elseif ($controller === AdminController::class || $controller === UserController::class) {
                $controllerInstance = new $controller($this->auth);
            } else {
                $controllerInstance = new $controller();
            }

            // Appeler l'action du contrôleur
            $controllerInstance->$action();
        } else {
            http_response_code(404);
            echo "Page not found";
        }
    }
}

