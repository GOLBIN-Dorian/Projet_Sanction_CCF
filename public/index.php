<?php
// Front controller minimal pour le projet
// Charge automatique simple PSR-4 pour le namespace App\ -> src/
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';
    // only handle classes in App\ namespace
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }
    $relative_class = substr($class, strlen($prefix));
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use App\Http\Request;
use App\Http\Response;
use App\Routing\Router;

// Démarrage basique
try {
    $request = new Request();
    $response = new Response();
    $router = new Router($request, $response);

    // Définition des fonctions/actions
    function action_index(Request $req, Response $res)
    {
        // page d'accueil
        $res->view('Gestions/index.php');
    }

    function action_connexion(Request $req, Response $res)
    {
        $res->view('Gestions/connexion.php');
    }

    function action_inscription(Request $req, Response $res)
    {
        include __DIR__ . '/../src/controllers/inscription.php';
    }

    function action_dashboard(Request $req, Response $res)
    {
        $res->view('Gestions/dashboard.php');
    }

    // Routes disponibles
    $router
        ->addRoute('index', 'action_index', ['GET'])
        ->addRoute('connexion', 'action_connexion', ['GET', 'POST'])
        ->addRoute('inscription', 'action_inscription', ['GET', 'POST'])
        ->addRoute('dashboard', 'action_dashboard', ['GET']);

    // Fallback: if action not found Router::handleRequest will redirect to index
    $router->handleRequest();
} catch (Exception $e) {
    // Erreur fatale : renvoyer un simple message
    http_response_code(500);
    echo "Erreur interne : " . htmlspecialchars($e->getMessage());
    exit;
}
