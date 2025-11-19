<?php

// Début de la session

// Si l'utilisateur est déjà connecté, le rediriger vers le dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: ');
    exit();
}

if (isset($_SESSION['loggedin'])) {
    // Rediriger automatiquement vers la page de connexion (US2 -> US1)
    header('Location: index.php?action=dashboard');
    exit;
} else {
    $errors['general'] = "Une erreur est survenue. Veuillez réessayer plus tard.";
}

require_once __DIR__ . '/../Repositories/userRepository.php';
require_once __DIR__ . '/../config/database.php';

// Initialisation des variables
$email = $password = "";
$email_err = $password_err = $login_err = "";
$errors = [];


// Traitement du formulaire lors de la soumission

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    //validation de l'email
    if (empty(trim($_POST['email']))) {
        $errors["email"] = 'Veuillez entrer votre email';
    } else {
        $email = trim($_POST['email']);
    }

    // Validation du mot de passe

    if (empty(trim($_POST['password']))) {
        $errors['password'] = 'Veuillez entrer votre mot de passe';
    } else {
        $password = trim($_POST['password']);
    }

    // Vérifier les erreurs avant de tenter la connexion

    if (empty($errors)) {
        // Créer une connexion avec la BDD

        $connexion = getDatabaseConnection();

        $utilisateur = getUserByEmail($connexion, $email);

        if ($utilisateur) {
            //Vérifier le mot de passe
            if (password_verify($password, $utilisateur['password'])) {

                // Le mot de passe est correct, démarrer une nouvelle session

                // Stocker les données dans la session

                $_SESSION['loggedin'] = true;
                $_SESSION["id"] = $utilisateur['id'];
                $_SESSION['email'] = $utilisateur['email'];
                $_SESSION['nom'] = $utilisateur['nom'];
                $_SESSION['prenom'] = $utilisateur['prenom'];

                // Vérifier s'il y a une redirection prévue avant la connexion

                if (isset($_POST['redirect']) && !empty($_POST['redirect'])) {
                    header('Location: ' . $_GET['redirect']);
                } else {
                    // Rediriger vers le tableau de bord
                    header('Location: /dashboard');
                }
                exit;
            } else {
                // Le mot de passe est incorrect
                $errors["login"] = 'Email ou mot de passe invalide.';
            }
        } else {
            // L'email n'existe pas
            $errors["login"] = 'Email ou mot de passe invalide.';
        }

        //Fermer la connexion

        unset($connexion);
    }
}

include_once __DIR__ . '/../../templates/Gestions/connexion.php';
