<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/chemin.php';

use App\Controllers\HomeController;
use App\Controllers\SearchControleur;
use App\Controllers\ElementController;

try {
    $url = $_SERVER['REQUEST_URI'];
    $path = trim(str_replace(URL, '', parse_url($url, PHP_URL_PATH)), '/');
        $pdo = require_once __DIR__ . '/config/bdd.php'; // Ajout pour inclure PDO


    // Routeur simple
    switch ($path) {
        case '':
        case '/':
            $controller = new HomeController();
            $controller->index();
            break;

        case 'search':
            $controller = new SearchControleur($pdo);
            $controller->resultSearch();
            break;

        case 'element':
            $controller = new ElementController($pdo);
            $controller->afficher($_GET['id']);
            break;
        default:
            http_response_code(404);
            echo "Page non trouvée : " . htmlspecialchars($path);
            break;
    }
} catch (\Throwable $e) {
    // Gestion des erreurs globales
    http_response_code(500);
    echo "Une erreur est survenue : " . $e->getMessage();
}
