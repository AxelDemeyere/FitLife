
CREATE TABLE Utilisateur (
    id_utilisateur INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    mot_de_passe TEXT NOT NULL,
    role TEXT CHECK(role IN ('client', 'admin')) NOT NULL
);

CREATE TABLE Cours (
    id_cours INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    description TEXT
);

CREATE TABLE Creneau (
    id_creneau INTEGER PRIMARY KEY AUTOINCREMENT,
    date_heure DATETIME NOT NULL,
    id_cours INTEGER NOT NULL,
    FOREIGN KEY (id_cours) REFERENCES Cours(id_cours) ON DELETE CASCADE
);

CREATE TABLE Reservation (
    id_utilisateur INTEGER NOT NULL,
    id_creneau INTEGER NOT NULL,
    PRIMARY KEY (id_utilisateur, id_creneau),
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur) ON DELETE CASCADE,
    FOREIGN KEY (id_creneau) REFERENCES Creneau(id_creneau) ON DELETE CASCADE
);
