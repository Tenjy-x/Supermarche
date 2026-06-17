CREATE TABLE Produits (
    id INTEGER PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Prix DECIMAL(10, 2) NOT NULL,
    Designation VARCHAR(255),
    Quantite_en_stock INTEGER NOT NULL
);

CREATE TABLE Caisse (
    id INTEGER PRIMARY KEY,
    numero_caisse VARCHAR(255) NOT NULL
);
CREATE TABLE Produit_Achat(
    id INTEGER PRIMARY KEY,
    id_produit INTEGER NOT NULL,
    Quantite_achetee INTEGER NOT NULL,
    FOREIGN KEY (id_produit) REFERENCES Produits(id)
);

CREATE TABLE Achat (
    id INTEGER PRIMARY KEY,
    id_produit_Achat INTEGER NOT NULL,
    id_client INTEGER NOT NULL,
    id_caisse INTEGER NOT NULL,
    Date_achat DATETIME NOT NULL,
    FOREIGN KEY (id_produit_Achat) REFERENCES Produit_Achat(id),
    FOREIGN KEY (id_caisse) REFERENCES Caisse(id)
);

CREATE TABLE Historique (
    id INTEGER PRIMARY KEY,
    id_achat INTEGER NOT NULL,
    Date_historique DATETIME NOT NULL,
    statut VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_achat) REFERENCES Achat(id)
);

CREATE TABLE Clients (
    id INTEGER PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Prenom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL
);




