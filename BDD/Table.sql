-- Active: 1720539271019@@127.0.0.1@5432@seadev


DROP TABLE IF EXISTS _CommentaireToTicket;
DROP TABLE IF EXISTS Commentaire;
DROP TABLE IF EXISTS Ticket;
DROP TABLE IF EXISTS Client;
DROP TABLE IF EXISTS Utilisateur;


CREATE Table Utilisateur(
    ID_user SERIAL PRIMARY KEY,
    identifiant_utilisateur VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(15) NOT NULL
);

CREATE TABLE Client(
    ID_client SERIAL PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(20),
    email VARCHAR(255) NOT NULL UNIQUE,
    ID_user INTEGER NOT NULL,
    Foreign Key (ID_user) REFERENCES Utilisateur (ID_user) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE Table Commentaire(
    ID_commentaire SERIAL PRIMARY KEY,
    C_text TEXT,
    C_pj VARCHAR(255)
);

CREATE TABLE Ticket(
    ID_Ticket SERIAL PRIMARY KEY,
    Piece_jointe VARCHAR(255),
    Demande_ticket TEXT NOT NULL,
    Raison_ticket VARCHAR(50) NOT NULL,
    Status_ticket VARCHAR(50) NOT NULL,
    ID_user INTEGER NOT NULL,
    Foreign Key (ID_user) REFERENCES Utilisateur (ID_user) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE Table _CommentaireToTicket(
    ID_commentaire INTEGER NOT NULL,
    ID_ticket INTEGER NOT NULL,
    Foreign Key (ID_commentaire) REFERENCES Commentaire (ID_commentaire) ON UPDATE CASCADE ON DELETE CASCADE,
    Foreign Key (ID_ticket) REFERENCES Ticket (ID_Ticket) ON UPDATE CASCADE ON DELETE CASCADE
);