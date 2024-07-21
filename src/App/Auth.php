<?php
declare(strict_types=1);
namespace seadev\App;


class Auth {
    
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function user()
    {

    }

    public function loggin (string $username, string $password)
    {

    }
}

