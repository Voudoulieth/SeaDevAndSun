-- Active: 1720539271019@@127.0.0.1@5432@seadev@public
-- Insertion des utilisateurs avec des identifiants uniques et mots de passe valides
INSERT INTO Utilisateur (identifiant_utilisateur, password) VALUES 
('john_doe', 'password1'),
('jane_smith', 'password2'),
('charlie_brown', 'password3');

-- Test d'insertion d'un utilisateur avec un identifiant trop long (doit échouer)
-- Le texte ci-dessous contient exactement 256 caractères.
INSERT INTO Utilisateur (identifiant_utilisateur, password) VALUES 
('identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_identifiant_trop_long_', 'password4'); -- invalide

-- Test d'insertion d'un utilisateur avec un mot de passe trop long (doit échouer)
INSERT INTO Utilisateur (identifiant_utilisateur, password) VALUES 
('short_identifiant', 'motdepassetreslongmotdepassetreslong'); -- invalide

-- Insertion des clients avec des noms, prénoms et emails valides
INSERT INTO Client (Nom, Prenom, email, ID_user) VALUES 
('Doe', 'John', 'john.doe@example.com', 1), -- valide
('Smith', 'Jane', 'jane.smith@example.com', 2), -- valide
('Brown', 'Charlie', 'charlie.brown@example.com', 3); -- valide

-- Test de doublon d'email (doit échouer)
INSERT INTO Client (Nom, Prenom, email, ID_user) VALUES 
('Duplicate', 'Email', 'john.doe@example.com', 1); -- invalide

-- Test de clé étrangère non existante (doit échouer)
INSERT INTO Client (Nom, Prenom, email, ID_user) VALUES 
('Invalid', 'User', 'invalid.user@example.com', 99); -- invalide

-- Insertion des commentaires avec des textes et pièces jointes valides
INSERT INTO Commentaire (C_text, C_pj) VALUES 
('This is a comment with attachment.', 'attachment1.png'), -- valide
('This is a comment without attachment.', NULL), -- valide
('This is another comment with attachment.', 'attachment2.jpg'); -- valide

-- Test d'insertion d'un commentaire avec un texte très long (doit échouer)
-- Le texte ci-dessous contient exactement 256 caractères.
INSERT INTO Commentaire (C_text, C_pj) VALUES 
('aaa', 'texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_texte_tres_long_.png'); -- invalide

-- Insertion des tickets avec des pièces jointes, demandes, raisons, statuts et utilisateurs valides
INSERT INTO Ticket (Piece_jointe, Demande_ticket, Raison_ticket, Status_ticket, ID_user) VALUES 
('attachment1.pdf', 'Help with my account.', 'Account Issue', 'Open', 1), -- valide
('attachment2.docx', 'Application not working.', 'Technical Issue', 'In Progress', 2), -- valide
('attachment3.zip', 'Billing question.', 'Billing Issue', 'Closed', 3); -- valide

-- Test de clé étrangère non existante pour les tickets (doit échouer)
INSERT INTO Ticket (Piece_jointe, Demande_ticket, Raison_ticket, Status_ticket, ID_user) VALUES 
('invalid_attachment.pdf', 'Invalid user.', 'Other Issue', 'Open', 99); -- invalide

-- Test d'insertion de ticket avec un identifiant de catégorie non existant (doit échouer)
INSERT INTO Ticket (Piece_jointe, Demande_ticket, Raison_ticket, Status_ticket, ID_user, ID_categorie) VALUES 
('attachment4.pdf', 'Invalid category.', 'Other Issue', 'Open', 1, 99); -- invalide

-- Association des commentaires aux tickets avec des clés étrangères valides
INSERT INTO _CommentaireToTicket (ID_commentaire, ID_ticket) VALUES 
(1, 1), -- valide
(2, 2), -- valide
(3, 3); -- valide

-- Test de clé étrangère non existante pour l'association des commentaires aux tickets (doit échouer)
INSERT INTO _CommentaireToTicket (ID_commentaire, ID_ticket) VALUES 
(99, 1); -- invalide
INSERT INTO _CommentaireToTicket (ID_commentaire, ID_ticket) VALUES 
(1, 99); -- invalide
