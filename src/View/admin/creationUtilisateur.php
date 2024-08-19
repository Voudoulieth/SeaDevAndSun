<?php
require 'E:\Alexandre\Projet web\SeaDevAndSun\vendor\autoload.php';
use Seadev\Dao\Database;

if (!empty($_POST)) {
    try {
        // Connexion à la base de données
        $pdo = Database::getConnection();

        // Vérifier la synchronisation de la database
        $pdo->query("SELECT setval(pg_get_serial_sequence('utilisateur', 'id_utilisateur'), COALESCE(MAX(id_utilisateur), 1)) FROM utilisateur");

        
        // Récupération des données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Mot de passe en clair
        
        // Hashage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Détermination du statut admin
        $isAdmin = isset($_POST['is_admin']) ? true : false;
        
        // Insertion de l'utilisateur dans la base de données
        $query = $pdo->prepare('INSERT INTO Utilisateur (nom, prenom, email, password, is_admin) VALUES (:nom, :prenom, :email, :password, :is_admin)');
        $query->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $hashedPassword,
            'is_admin' => $isAdmin
        ]);
        
        echo "Utilisateur ajouté avec succès.";
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Utilisateur</title>
</head>
<body>
    <div>
        <form action="#" method="post">
            <div>
                <input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div>
                <input type="text" name="prenom" placeholder="Prénom" required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div>
                <label>Est-ce un administrateur ?</label>
                <div>
                    <input type="radio" id="admin_yes" name="is_admin" value="1">
                    <label for="admin_yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="admin_no" name="is_admin" value="0" checked>
                    <label for="admin_no">Non</label>
                </div>
            </div>
            <button type="submit">Créer Utilisateur</button>
        </form>
    </div>
</body>
</html>
