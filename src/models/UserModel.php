<?php

// Toutes les fonctions liées aux utilisateurs.

/**
 * Insère un utilisateur et retourne l'id inséré ou false en cas d'erreur.
 *
 * - Hash le mot de passe avec password_hash.
 * - Utilise une requête préparée pour éviter les injections SQL.
 * - Retourne l'ID auto-incrémenté (int) si l'insertion réussit, false sinon.
 *
 * @param PDO   $connexion   Objet PDO connecté à la base.
 * @param array $utilisateur Tableau contenant au minimum :
 *                           - email (string)
 *                           - password (string, en clair)
 *                           - nom (string)
 *                           - prenom (string)
 * @return int|false ID inséré (int) ou false en cas d'erreur.
 */
function createUser(PDO $connexion, array $utilisateur): int|false
{
    // Récupération des données depuis le tableau
    $email         = $utilisateur['email'];
    $password      = $utilisateur['password'];
    $nom           = $utilisateur['nom'];
    $prenom        = $utilisateur['prenom'];

    // Vérification minimale des champs obligatoires
    if ($email === null || $password === null || $nom === null || $prenom === null) {
        return false;
    }



    try {
        $sql = "INSERT INTO utilisateurs (email, password, nom, prenom)
                VALUES (:email, :password, :nom, :prenom)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);


        if ($stmt->execute()) {
            return (int) $connexion->lastInsertId();
        }

        return false;
    } catch (PDOException $e) {
        error_log('createUser PDO Error: ' . $e->getMessage());
        return false;
    }
}

/**
 * Vérifie si une adresse email existe déjà dans la table utilisateurs.
 *
 * @param PDO    $connexion Objet PDO connecté à la base.
 * @param string $email     Email à vérifier.
 * @return bool  true si l'email existe, false sinon.
 */
function emailExiste(PDO $connexion, string $email): bool
{
    $requete = "SELECT id FROM utilisateurs WHERE email = :email";
    $requetePDO = $connexion->prepare($requete);
    $requetePDO->bindValue(':email', $email, PDO::PARAM_STR);

    $requetePDO->execute();

    return $requetePDO->rowCount() > 0;
}

function getUserByEmail(PDO $connexion, string $email): array|false
{
    $requete = "SELECT id, email, password, prenom, nom
                FROM utilisateurs
                WHERE email = :email";

    $requetePDO = $connexion->prepare($requete);
    $requetePDO->bindValue(':email', $email, PDO::PARAM_STR);
    $requetePDO->execute();

    return $requetePDO->fetch(PDO::FETCH_ASSOC);
}
