<?php
declare(strict_types=1);
namespace Seadev\Test;
require 'E:\Alexandre\Projet web\SeaDevAndSun\vendor\autoload.php';
// require_once 'E:\Alexandre\Projet web\SeaDevAndSun\src\metiers\Utilisateur.php';
// require_once 'E:\Alexandre\Projet web\SeaDevAndSun\src\metiers\Admin.php';


use Seadev\Metier\Utilisateur;
use Seadev\Metier\Admin;

$user = new Utilisateur(2,'Doe','John','johndoe@pda.com','aaaaz',false);
echo $user;

$admin = new Admin(1,'Prout','dédé','dédéprout@prout.com','aaaaaab');
echo $admin;