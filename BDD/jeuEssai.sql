-- Insérer des utilisateurs avec IDs explicites
INSERT INTO utilisateur (id_utilisateur, nom, prenom, email, password, is_admin) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@example.com', 'hashed_password1', FALSE),
(2, 'Martin', 'Lucie', 'lucie.martin@example.com', 'hashed_password2', TRUE),
(3, 'Durand', 'Pierre', 'pierre.durand@example.com', 'hashed_password3', FALSE);

-- Insérer des statuts avec IDs explicites
INSERT INTO status (id_status, nom_status) VALUES
(1, 'Ouvert'),
(2, 'En cours'),
(3, 'Fermé');

-- Insérer des raisons avec IDs explicites
INSERT INTO raison (id_raison, nom_raison, icone_raison) VALUES
(1, 'Bug', '/path/to/bug_icon.png'),
(2, 'Demande de fonctionnalité', '/path/to/feature_request_icon.png'),
(3, 'Support', '/path/to/support_icon.png'),
(4, 'Autre', '/path/to/other_icon.png');

-- Insérer des tickets avec IDs explicites
INSERT INTO ticket (id_ticket, demande_ticket, id_utilisateur, id_status, id_raison) VALUES
(1, 'Problème de connexion à la base de données', 1, 1, 1),
(2, 'Ajout d/une fonctionnalité de recherche avancée', 2, 2, 2),
(3, 'Assistance pour configuration de l\environnement', 3, 3, 3);

-- Insérer des commentaires avec IDs explicites
INSERT INTO commentaire (id_commentaire, c_contenu, id_ticket) VALUES
(1, 'Ce problème semble être lié à une configuration incorrecte.', 1),
(2, 'La fonctionnalité a été partiellement implémentée.', 2),
(3, 'Merci pour l\aide, tout fonctionne maintenant.', 3);

-- Insérer des pièces jointes avec IDs explicites
INSERT INTO piecejointe (id_pj, adresse_pj, id_ticket) VALUES
(1, '/uploads/db_error_screenshot.png', 1),
(2, '/uploads/search_feature_design.pdf', 2),
(3, '/uploads/config_guide.pdf', 3);
