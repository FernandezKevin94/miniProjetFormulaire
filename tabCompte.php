<?php
require 'cnxConfig.php';

$connexion = retourCnx();

$tab= "CREATE TABLE compte (
    idCompte INT AUTO_INCREMENT PRIMARY KEY,
    idClient INT,
    pseudo VARCHAR(100),
    mot_de_passe VARCHAR(255),
    FOREIGN KEY (idClient) REFERENCES client(id)
)";
try {
    $connexion->exec($tab);
    echo "Table 'client' créée avec succès !";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la table : " . $e->getMessage();
}