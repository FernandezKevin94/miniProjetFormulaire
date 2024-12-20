<?php

require 'cnxConfig.php';

$connexion = retourCnx();

$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];
$idClient = $_POST['idClient'];

$stmtCheck = $connexion->prepare("SELECT id FROM client WHERE id = :idClient");
$stmtCheck->bindParam(':idClient', $idClient, PDO::PARAM_INT);
$stmtCheck->execute();

if ($stmtCheck->rowCount() === 0) {
    die("Erreur : Aucun utilisateur avec l'ID fourni.");
}

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$queryInsert = "INSERT INTO compte (idClient, pseudo, mot_de_passe) 
                VALUES (:idClient, :pseudo, :motDePasse)";

try {
    $stmtInsert = $connexion->prepare($queryInsert);
    $stmtInsert->bindParam(':idClient', $idClient, PDO::PARAM_INT);
    $stmtInsert->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmtInsert->bindParam(':motDePasse', $password, PDO::PARAM_STR);
    $stmtInsert->execute();

    echo "Compte ajouté avec succès pour l'utilisateur ID : $idClient";
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du compte : " . $e->getMessage();
}