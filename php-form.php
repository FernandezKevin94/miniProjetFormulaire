<?php

include "cnxConfig.php";

$bdd = "create table Client(
    id INT AUTO_INCREMENT PRIMARY KEY,
    civilite ENUM('M.', 'Mme') NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    dateNaissance DATE NOT NULL,
    communeNaissance VARCHAR(100) NOT NULL,
    telephone VARCHAR(15),
    courriel VARCHAR(100),
    siteWeb VARCHAR(255),
    niveauAnglais ENUM('A1', 'B1', 'C1') NOT NULL,
    html BOOLEAN DEFAULT FALSE,
    css BOOLEAN DEFAULT FALSE,
    javascript BOOLEAN DEFAULT FALSE,
    php BOOLEAN DEFAULT FALSE
    )";

// Exécution de la requête
$connexion->exec($bdd);
echo "Table Client created successfully";
