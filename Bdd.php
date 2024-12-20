<?php
function createDatabase() {
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try {
        $connexion = new PDO("mysql:host=$host", $user, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "CREATE DATABASE IF NOT EXISTS dbusers CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
        $connexion->exec($query);

        echo "Base de données 'dbusers' créée avec succès !";
    } catch (PDOException $e) {
        echo "Erreur lors de la création de la base de données : " . $e->getMessage();
    }
}

createDatabase();
?>