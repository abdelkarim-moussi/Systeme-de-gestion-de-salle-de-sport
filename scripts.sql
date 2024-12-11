-- CREATE DATABASE QUERY
CREATE DATABASE systemdb;

-- CREATE TABLE QUERY
CREATE TABLE activities(
    id_Activity INT PRIMARY KEY NOT NULL  AUTO_INCREMENT?
    nom_Activity VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    disponiblity INT NOT NULL
);

CREATE TABLE reservations(
    id_Rerervation INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_Activity INT,
    nom_reservation VARCHAR(50) NOT NULL,
    date_reservation DATE NOT NULL,
    FOREIGN KEY(id_Activities) REFERENCES(activities) ON DELETE CASCADE ON UPDATE CASCADE
);
-- INSER QUERY EXEMPLE
INSERT INTO activities(nom_Activity,description,date_debut,date_fin,disponibility)
VALUES
("yoga","cours de yoga pour les gens qui on des problèmes de concentration","2024-11-15","2024-12-15",20),
("fitness","cour de fitnes pour les gens qui aime la musculation","2024-11-10","2024-12-20",15);

INSERT INTO reservations(id_Activity,nom_reservation,date_reservation)
VALUES 
(1,reservation_1,CURRENT_DATE),
(2,reservation_2,CURRENT_DATE);


-- JOIN EXAMPLE
SELECT activities.nom_Activity
FROM activities
INNER JOIN reservations ON reservations.id_Activity = activities.id_Activity;


-- DELETE FROM activities TABLE

DELETE FROM activities WHERE id_Activity = 1;

-- UPDATE the activity name

UPDATE activities
SET nom_Activity = "Jambaz"
WHERE id_Activity = 1; 

