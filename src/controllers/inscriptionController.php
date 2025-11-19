<?php

// Si l'utilisateur est déjà connecté, le rediriger vers la page d'accueil
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../Repositories/userRepository.php';

// Initialisation des variables
$email = $password = $confirm_password = $prenom = $nom = "";
$errors = [];
$success_message = "";

// Traitement du formulaire lors de la soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validation du nom
    if (empty(trim($_POST["nom"]))) {
        $errors['nom'] = "Veuillez entrer votre nom.";
    } else {
        $nom = trim($_POST["nom"]);
    }

    // Validation du prénom
    if (empty(trim($_POST["prenom"]))) {
        $errors['prenom'] = "Veuillez entrer votre prénom.";
    } else {
        $prenom = trim($_POST["prenom"]);
    }

    // Validation de l'email
    if (empty(trim($_POST["email"]))) {
        $errors['email'] = "Veuillez entrer une adresse email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Veuillez entrer une adresse email valide.";
    } else {
        $connexion = getDatabaseConnection();

        if (emailExiste($connexion, trim($_POST["email"]))) {
            $errors['email'] = "Cette adresse email est déjà utilisée.";
        } else {
            $email = trim($_POST["email"]);
        }
    }

    // Validation du mot de passe
    if (empty(trim($_POST["password"]))) {
        $errors['password'] = "Veuillez entrer un mot de passe.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères.";
    } elseif (!preg_match('/[A-Z]/', trim($_POST["password"]))) {
        $errors['password'] = "Le mot de passe doit contenir au moins une majuscule.";
    } elseif (!preg_match('/[0-9]/', trim($_POST["password"]))) {
        $errors['password'] = "Le mot de passe doit contenir au moins un chiffre.";
    } else {
        $password = trim($_POST["password"]);
    }


    // Validation de la confirmation du mot de passe
    if (empty(trim($_POST["password2"]))) {
        $errors['password2'] = "Veuillez confirmer le mot de passe.";
    } else {
        $confirm_password = trim($_POST["password2"]);
        if (empty($errors['password']) && ($password != $confirm_password)) {
            $errors['password2'] = "Les mots de passe ne correspondent pas.";
        }
    }

    // Vérification des erreurs avant l'insertion dans la base
    if (empty($errors)) {


        $connexion = getDatabaseConnection();

        $nouvelUtilisateur = [
            'email' => $email,
            'password' => $password,
            'prenom' => $prenom,
            'nom' => $nom
        ];

        // Insertion de l'utilisateur dans la base de données
        if (createUser($connexion, $nouvelUtilisateur)) {
            // Rediriger automatiquement vers la page de connexion (US2 -> US1)
            header('Location: index.php?action=connexion');
            exit;
        } else {
            $errors['general'] = "Une erreur est survenue. Veuillez réessayer plus tard.";
        }

        unset($connexion);
    }
}

include_once __DIR__ . '/../../templates/Gestions/inscription.php';
