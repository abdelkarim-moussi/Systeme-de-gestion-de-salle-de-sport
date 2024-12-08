CREATE TABLE members(
    id_Member INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telephone VARCHAR(15) NOT NULL
);

CREATE TABLE activities(
    id_Activity INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_activity VARCHAR(50) NOT NULL,
    description TEXT,
    capacite INT ,
    date_debut DATE,
    date_fin DATE,
    disponibilite INT
);

CREATE TABLE reservations(
    id_Reservation INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_Member INT NOT NULL,
    id_Activity INT NOT NULL,
    date_Reservation DATETIME,
    status ENUM("confirme","annuler"),
    FOREIGN KEY(id_Member) REFERENCES members(id_Member),
    FOREIGN KEY(id_Activity) REFERENCES activities(id_Activity)
);