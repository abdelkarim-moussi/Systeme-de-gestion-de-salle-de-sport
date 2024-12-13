-- CREATE DATABASE QUERY
CREATE DATABASE systemdb;

-- CREATE TABLE QUERY
CREATE TABLE activities(
    id_Activity INT PRIMARY KEY NOT NULL  AUTO_INCREMENT?
    nom_Activity VARCHAR(50),
    description TEXT,
    date_debut DATE,
    date_fin DATE,
    disponiblity INT
);

CREATE TABLE reservations(
    id_Activities INT FOREIGN KEY REFERENCES(activities) AUTO_INCREMENT,
    id_Rerervation INT PRIMARY KEY NOT NULL  AUTO_INCREMENT?,
    nom_reservation VARCHAR(50),
    date_reservation DATE
);

-- INSER QUERY EXEMPLE
INSERT INTO activities(nom_Activity,description,date_debut,date_fin,disponibility)
VALUES
("yoga","cours de yoga pour les gens qui on des problèmes de concentration","2024-11-15","2024-12-15",20)
("fitness","cour de fitnes pour les gens qui aime la musculation","2024-11-10","2024-12-20",15);


-- JOIN EXAMPLE
SELECT nom_Activity FROM activities
INNER JOIN reservations ON reservations.id_Activity = activities.id_Activity;
