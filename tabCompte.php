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

try {
    $connexion->exec("ALTER TABLE compte ADD photo VARCHAR(255)");
    echo "Colonne 'photo' ajoutée avec succès à la table 'compte'.";
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout de la colonne 'photo' : " . $e->getMessage();
}
?>
