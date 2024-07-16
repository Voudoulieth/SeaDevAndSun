<?php
declare(strict_types=1);
namespace seadevandsun\metier;

class Admin extends Utilisateur {

    public function __construct(int $idUser, string $nom, string $prenom, string $email, string $passWord)
    {
        parent::__construct($idUser, $nom, $prenom, $email, $passWord, true);
    }
}
