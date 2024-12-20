
<?php
require 'cnxConfig.php';

$connexion = retourCnx();

    $query = "CREATE TABLE client (
        id INT AUTO_INCREMENT PRIMARY KEY,
        civilite ENUM('M.', 'Mme'),
        nom VARCHAR(100),
        prenom VARCHAR(100),
        date_naissance DATE,
        commune_naissance VARCHAR(100),
        telephone VARCHAR(15),
        courriel VARCHAR(100),
        site_web VARCHAR(255),
        niveau_anglais ENUM('A1', 'B1', 'C1'),
        html BOOLEAN DEFAULT FALSE,
        css BOOLEAN DEFAULT FALSE,
        javascript BOOLEAN DEFAULT FALSE,
        php BOOLEAN DEFAULT FALSE
    )";

    try {
        $connexion->exec($query);
        echo "Table 'client' créée avec succès !";
    } catch (PDOException $e) {
        echo "Erreur lors de la création de la table : " . $e->getMessage();
    }
    
?>
