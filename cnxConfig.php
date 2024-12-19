<?php

function retourCnx(){

    //Paramètres de connexion à la base de données
    $host = 'localhost';
    $dbname = 'dbusers';
    $user = 'root';
    $password = '';
    
    try {
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=$host;dbname=$dbusers", $user, $password);
    // Définition des attributs de gestion d'erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
    } catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    }

    return $connexion;

    }