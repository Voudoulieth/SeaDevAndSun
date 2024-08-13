<?php
declare(strict_types=1);
namespace Seadev\Test;

use Seadev\Dao\Database;
use Seadev\Dao\DaoException;
// Faire une requête pour vérifier si la connexion à la BDD fonctionne
// d'abord faire la connexion
require __DIR__ . '/../dao/Database.php';
require __DIR__ . '/../dao/DaoException.php';// Assurez-vous que ce chemin est correct

try {
    // Essayez d'obtenir une connexion
    $db = Database::getConnection();

    // Exécutez une requête simple
    $query = $db->query('SELECT 1');
    $result = $query->fetch();

    if ($result) {
        echo "Connexion réussie et requête exécutée avec succès.";
    } else {
        echo "Connexion réussie, mais la requête n'a pas donné de résultats.";
    }
} catch (\Exception $e) {
    echo "Échec de la connexion : " . $e->getMessage();
}

?>
