<?php
declare(strict_types=1);
// require_once 'E:/Alexandre/Projet web/SeaDevAndSun/vendor/autoload.php';
require_once 'E:\Alexandre\Projet web\SeaDevAndSun\src\metiers\Utilisateur.php';
require_once 'E:\Alexandre\Projet web\SeaDevAndSun\src\metiers\Admin.php';


use seadev\metier\Utilisateur;
use seadev\metier\Admin;

$user = new Utilisateur(2,'Doe','John','johndoe@pda.com','aaaaz',false);
echo $user;

$admin = new Admin(1,'Prout','dédé','dédéprout@prout.com','aaaaaab');
echo $admin;