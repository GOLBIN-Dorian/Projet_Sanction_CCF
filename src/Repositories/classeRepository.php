<?php

require_once __DIR__ . '/../config/database.php';

function createClasse(PDO $connexion, array $classe): int|false
{

    // Récupération des données depuis le tableau
    $nom_classe = $classe['nom_classe'];
    $niveau = $classe['niveau'];

    // Vérification minimale des champs
    if ($nom_classe === null || $niveau === null) {
        return false;
    }

    try {
        $sql = "INSERT INTO classes (nom_classe,niveau)
                VALUES(:nom_classe, :niveau)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':nom_classe', $nom_classe, PDO::PARAM_STR);
        $stmt->bindValue(':niveau', $niveau, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return (int) $connexion->lastInsertId();
        }

        return false;
    } catch (PDOException $e) {
        error_log('createClasse PDO Error: ' . $e->getMessage());
        return false;
    }
}
function getClasseById(PDO $connexion, int $id_classe): array|false
{
    $requete = 'SELECT id_classe,nom_classe,niveau
                    FROM classes
                    WHERE id_classe = :id_classe';

    $requetePDO = $connexion->prepare($requete);
    $requetePDO->bindValue(':id_classe', $id_classe, PDO::PARAM_INT);
    $requetePDO->execute();

    return $requetePDO->fetch(PDO::FETCH_ASSOC);
}

function getAllClasses(PDO $connexion): array
{
    $requete = 'SELECT id_classe,nom_classe,niveau
                FROM classes
                ORDER BY nom_classe ASC';
    $requetePDO = $connexion->prepare($requete);
    $requetePDO->execute();

    return $requetePDO->fetchAll(PDO::FETCH_ASSOC);
}
