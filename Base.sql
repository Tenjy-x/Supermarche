CREATE TABLE Produits (
    id INTEGER PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Prix DECIMAL(10, 2) NOT NULL,
    Quantite_en_stock INTEGER NOT NULL
);

CREATE TABLE Caisse (
    id INTEGER PRIMARY KEY,
    numero_caisse VARCHAR(255) NOT NULL
);

CREATE TABLE Achat (
    id INTEGER PRIMARY KEY,
    id_produit INTEGER NOT NULL,
    id_client INTEGER NOT NULL,
    id_caisse INTEGER NOT NULL,
    Quantite_achetee INTEGER NOT NULL,
    Date_achat DATETIME NOT NULL,
    FOREIGN KEY (id_produit) REFERENCES Produits(id),
    FOREIGN KEY (id_caisse) REFERENCES Caisse(id)
);

CREATE TABLE Historique (
    id INTEGER PRIMARY KEY,
    id_achat INTEGER NOT NULL,
    Date_historique DATETIME NOT NULL,
    statut VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_achat) REFERENCES Achat(id)
);





