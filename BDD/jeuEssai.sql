-- Active: 1720539271019@@127.0.0.1@5432@seadev@public
-- Insertion des utilisateurs
INSERT INTO Utilisateur (identifiant_utilisateur, password) VALUES 
('user1', 'password1'),
('user2', 'password2'),
('user3', 'password3');

-- Insertion des clients
INSERT INTO Client (Nom, Prenom, email, ID_user) VALUES 
('Doe', 'John', 'john.doe@example.com', 1),
('Smith', 'Jane', 'jane.smith@example.com', 2),
('Brown', 'Charlie', 'charlie.brown@example.com', 3);

-- Insertion des commentaires
INSERT INTO Commentaire (C_text, C_pj) VALUES 
('This is the first comment.', 'file1.png'),
('This is the second comment.', 'file2.jpg'),
('This is the third comment.', NULL);

-- Insertion des tickets
INSERT INTO Ticket (Piece_jointe, Demande_ticket, Raison_ticket, Status_ticket, ID_user) VALUES 
('attachment1.pdf', 'I need help with my account.', 'Account Issue', 'Open', 1),
('attachment2.docx', 'The application is not working.', 'Technical Issue', 'In Progress', 2),
('attachment3.zip', 'I have a billing question.', 'Billing Issue', 'Closed', 3);

-- Association des commentaires aux tickets
INSERT INTO _CommentaireToTicket (ID_commentaire, ID_ticket) VALUES 
(1, 1),
(2, 2),
(3, 3);
