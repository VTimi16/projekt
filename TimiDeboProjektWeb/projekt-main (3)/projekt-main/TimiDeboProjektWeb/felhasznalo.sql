CREATE DATABASE felhasznalokbazis;

USE felhasznalokbazis;

CREATE TABLE felhasznalok (
    id INT AUTO_INCREMENT PRIMARY KEY,
    felhasznalonev VARCHAR(100) UNIQUE,
    jelszo VARCHAR(255) NOT NULL,
    profilkep LONGBLOB
);