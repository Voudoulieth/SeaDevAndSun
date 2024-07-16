<?php
declare(strict_types=1);
namespace seadev\metier;

class Admin extends Utilisateur {

    public function __construct(int $idUser, string $nom, string $prenom, string $email, string $passWord)
    {
        parent::__construct($idUser, $nom, $prenom, $email, $passWord, true);
    }

    public function __toString():string
    {
        return '[Admin : '. parent::__toString() . ']';
    }
}
