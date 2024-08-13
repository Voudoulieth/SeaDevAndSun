-- Insertion valide
INSERT INTO utilisateur (id_utilisateur, nom, prenom, email, password, is_admin) VALUES
(4, 'Lemoine', 'Sophie', 'sophie.lemoine@example.com', 'hashed_password4', FALSE);

-- Insertion invalide : doublon d'email
INSERT INTO utilisateur (id_utilisateur, nom, prenom, email, password, is_admin) VALUES
(5, 'Dupuis', 'Marc', 'jean.dupont@example.com', 'hashed_password5', FALSE);

-- Insertion invalide : violation de la contrainte NOT NULL (nom NULL)
INSERT INTO utilisateur (id_utilisateur, nom, prenom, email, password, is_admin) VALUES
(6, NULL, 'Paul', 'paul.dupont@example.com', 'hashed_password6', FALSE);

-- Insertion invalide : violation de la contrainte NOT NULL (email NULL)
INSERT INTO utilisateur (id_utilisateur, nom, prenom, email, password, is_admin) VALUES
(7, 'Giraud', 'Marie', NULL, 'hashed_password7', FALSE);

-- Insertion valide
INSERT INTO status (id_status, nom_status) VALUES
(4, 'En attente');

-- Insertion invalide : violation de la contrainte NOT NULL (nom_status NULL)
INSERT INTO status (id_status, nom_status) VALUES
(5, NULL);

-- Insertion invalide : duplication d'ID
INSERT INTO status (id_status, nom_status) VALUES
(1, 'Réouvert');

-- Insertion valide
INSERT INTO raison (id_raison, nom_raison, icone_raison) VALUES
(5, 'Maintenance', '/path/to/maintenance_icon.png');

-- Insertion invalide : violation de l'unicité de nom_raison
INSERT INTO raison (id_raison, nom_raison, icone_raison) VALUES
(6, 'Bug', '/path/to/new_bug_icon.png');

-- Insertion invalide : violation de l'unicité de icone_raison
INSERT INTO raison (id_raison, nom_raison, icone_raison) VALUES
(7, 'Nouvelle Raison', '/path/to/bug_icon.png');

-- Insertion invalide : violation de la contrainte NOT NULL (icone_raison NULL)
INSERT INTO raison (id_raison, nom_raison, icone_raison) VALUES
(8, 'Test Raisons', NULL);

-- Insertion valide
INSERT INTO ticket (id_ticket, demande_ticket, id_utilisateur, id_status, id_raison) VALUES
(4, 'Demande d\amélioration de la sécurité', 1, 2, 2);

-- Insertion invalide : clé étrangère id_utilisateur non valide
INSERT INTO ticket (id_ticket, demande_ticket, id_utilisateur, id_status, id_raison) VALUES
(5, 'Problème d\authentification', 99, 1, 1);

-- Insertion invalide : clé étrangère id_status non valide
INSERT INTO ticket (id_ticket, demande_ticket, id_utilisateur, id_status, id_raison) VALUES
(6, 'Erreur lors de l\importation de données', 2, 99, 1);

-- Insertion invalide : clé étrangère id_raison non valide
INSERT INTO ticket (id_ticket, demande_ticket, id_utilisateur, id_status, id_raison) VALUES
(7, 'Problème de performance', 2, 1, 99);

-- Insertion invalide : violation de la contrainte NOT NULL (demande_ticket NULL)
INSERT INTO ticket (id_ticket, demande_ticket, id_utilisateur, id_status, id_raison) VALUES
(8, NULL, 2, 1, 1);

-- Insertion valide
INSERT INTO commentaire (id_commentaire, c_contenu, id_ticket) VALUES
(4, 'Je pense que c\'est un problème mineur.', 1);

-- Insertion invalide : clé étrangère id_ticket non valide
INSERT INTO commentaire (id_commentaire, c_contenu, id_ticket) VALUES
(5, 'Pas sûr de la cause exacte.', 99);

-- Insertion invalide : violation de la contrainte NOT NULL (c_contenu NULL)
INSERT INTO commentaire (id_commentaire, c_contenu, id_ticket) VALUES
(6, NULL, 2);

-- Insertion valide
INSERT INTO piecejointe (id_pj, adresse_pj, id_ticket) VALUES
(4, '/uploads/security_update.pdf', 4);

-- Insertion invalide : clé étrangère id_ticket non valide
INSERT INTO piecejointe (id_pj, adresse_pj, id_ticket) VALUES
(5, '/uploads/invalid_ticket.pdf', 99);

-- Insertion invalide : violation de la contrainte NOT NULL (adresse_pj NULL)
INSERT INTO piecejointe (id_pj, adresse_pj, id_ticket) VALUES
(6, NULL, 1);
