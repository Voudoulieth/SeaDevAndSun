<?php
// if (!isset($users)) {
//     die("Aucune donnée utilisateur disponible.");
// }
function formatDate($dateString)
{
    if (!$dateString) {
        return 'Non spécifiée';
    }

    try {
        $date = new DateTime($dateString);
        $formatter = new \IntlDateFormatter(
            'fr_FR',
            \IntlDateFormatter::FULL,
            \IntlDateFormatter::NONE,
            'Europe/Paris',
            \IntlDateFormatter::GREGORIAN,
            'd MMMM yyyy'
        );

        return $formatter->format($date);
    } catch (Exception $e) {
        return 'Date invalide';
    }
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
    <link rel="stylesheet" href="/Assets/Css/compte.css">
    <script src="/Assets/JavaScript/compte.js" defer> </script>
    <title>Bienvenue sur votre espace Administrateur</title>
</head>

<body>
    <?php include __DIR__ . '/../header.php'; ?>
    <?php include 'navbarAdmin.php' ?>

    <div class="main">
        <div class="container">
            <div>
                <button id="openPopup">Créer nouvel utilisateur</button>
                <button>Modifier utilisateur</button>
                <button name="action" value="delete">Supprimer utilisateur</button>
            </div>
            <table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date de création</th>
            <th>Sélection</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <?php
                $nom = htmlspecialchars(trim($user['nom'] ?? ''));
                $prenom = htmlspecialchars(trim($user['prenom'] ?? ''));
                $email = htmlspecialchars(trim($user['email'] ?? ''));
                $createdAt = htmlspecialchars(formatDate($user['created_at'] ?? '')) ?>
                <tr class='container_tab'>
                    <td><?= $nom ?></td>
                    <td><?= $prenom ?></td>
                    <td><?= $email ?></td>
                    <td>Créé le <?= $createdAt ?></td>
                    <td><input type='checkbox' name='action'></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun utilisateur trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

        </div>
    </div>
    <div id="popup" class="masquer">
        <!-- <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8') ?>"> -->
        <form action="/listeCompte" method="post">

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
            <button type="submit" name="action" value="create">Créer Utilisateur</button>
            <button id="closePopup">Fermer</button>
        </form>
    </div>
</body>

</html>