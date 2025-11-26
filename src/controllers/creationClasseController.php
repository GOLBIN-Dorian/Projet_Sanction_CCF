<?php

require_once __DIR__ . '/../Repositories/classeRepository.php';
require_once __DIR__ . '/../Repositories/niveauRepository.php';
require_once __DIR__ . '/../config/database.php';

use App\Http\Request;
use App\Http\Response;

function action_creationClasse(Request $req, Response $res): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Protection : redirection si utilisateur non connecté
    if (empty($_SESSION['user'])) {
        $res->redirect('index.php?action=connexion');
        return;
    }

    // Connexion BDD
    $connexion = getDatabaseConnection();

    // On récupère les niveaux pour la vue
    $niveaux = getAllNiveaux($connexion);

    // Valeurs par défaut
    $nom_classe = '';
    $id_niveau  = '';
    $errors     = [];

    // Traitement du formulaire
    if ($req->getMethod() === 'POST') {

        $nom_classe = trim($_POST['nom_classe'] ?? '');
        $id_niveau  = trim($_POST['id_niveau'] ?? '');

        // Validation du nom
        if ($nom_classe === '') {
            $errors['nom_classe'] = 'Le nom de la classe est requis.';
        }

        // Validation du niveau (simple mais correcte)
        if ($id_niveau === '') {
            $errors['id_niveau'] = 'Le niveau est requis.';
        } else {
            // On vérifie que l’ID envoyé existe bien dans la liste des niveaux
            $idsNiveauxValides = array_map('strval', array_column($niveaux, 'id_niveau'));

            if (!in_array((string) $id_niveau, $idsNiveauxValides, true)) {
                $errors['id_niveau'] = 'Le niveau sélectionné est invalide.';
            }
        }

        // Si tout est OK, on tente l’insertion
        if (empty($errors)) {
            $nouvelleClasse = [
                'nom_classe' => $nom_classe,
                'id_niveau'  => $id_niveau, // c’est bien l’ID
            ];

            if (createClasse($connexion, $nouvelleClasse)) {
                $res->redirect('index.php?action=listeClasse');
                return;
            }

            $errors['general'] = 'Une erreur est survenue lors de la création de la classe. Veuillez réessayer.';
        }
    }

    // Affichage de la vue (GET initial ou POST avec erreurs)
    $res->view('Gestions/creationClasse.php', [
        'nom_classe' => $nom_classe,
        'id_niveau'  => $id_niveau,
        'errors'     => $errors,
        'niveaux'    => $niveaux,
    ]);
}
