<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use App\Http\Request;
use App\Http\Response;

function action_creationClasse(Request $req, Response $res): void
{

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }


    if (empty($_SESSION['user'])) {
        $res->redirect('index.php?action=connexion');
        return;
    }
    $res->view('Gestions/creationClasse.php');

    $nom_classe = $id_niveau = "";
    $errors = [];

    if ($req->getMethod() === 'POST') {
        $nom_classe = trim($_POST['nom_classe'] ?? '');
        $id_niveau = trim($_POST['id_niveau'] ?? '');

        if ($nom_classe === '') {
            $errors['nom_classe'] = 'Le nom de la classe est requis.';
        }

        if ($id_niveau === '') {
            $errors['id_niveau'] = 'Le niveau est requis.';
        } elseif (!in_array($id_niveau, ['Seconde', 'Première', 'Terminale', 'BTS'])) {
            $errors['id_niveau'] = 'Le niveau sélectionné est invalide.';
        }

        if (empty($errors)) {
            $connexion = $connexion ?? getDatabaseConnection();

            $nouvelleClasse = [
                'nom_classe' => $nom_classe,
                'id_niveau' => $id_niveau
            ];

            if (createClasse($connexion, $nouvelleClasse)) {
                $res->redirect('index.php?action=listeClasse');
                return;
            }

            $errors['general'] = 'Une erreur est survenue lors de la création de la classe. Veuillez réessayer.';
        }
    }

    $res->view('Gestions/creationClasse.php', [
        'nom_classe' => $nom_classe,
        'id_niveau' => $id_niveau,
        'errors' => $errors
    ]);
}
