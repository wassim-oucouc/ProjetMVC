-- Active: 1739731566005@@127.0.0.1@3306@projetmvc
CREATE TABLE Utilisateurs(
ID INT PRIMARY KEY AUTO_INCREMENT,
Nom varchar(50),
Email varchar(50),
Password varchar(70)
);

CREATE TABLE Articles(
ID INT PRIMARY KEY AUTO_INCREMENT,
Titre varchar(100),
Date_publication Date,
id_utilisateur INT,
FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(ID)
);