<?php
namespace App\Controllers;

use App\Models\RecupeSearch;

class SearchControleur {
    private $recupeSearch;

    // Injection de dépendance pour passer PDO à RecupeSearch
    public function __construct($pdo) {
        $this->recupeSearch = new RecupeSearch($pdo);
    }

    /**
     * Traite les requêtes de recherche AJAX.
     */
    public function resultSearch() {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *'); // Permet les requêtes entre domaines, ajustez selon vos besoins

        try {
            // Vérification de la méthode HTTP
            if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
                http_response_code(405); // Méthode non autorisée
                echo json_encode(['error' => 'Méthode non autorisée']);
                return;
            }

            // Vérifie si la requête contient 'query'
            if (isset($_GET['query']) && is_string($_GET['query']) && !empty(trim($_GET['query']))) {
                $letter = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8'); // Sécurise l'entrée utilisateur
                $result = $this->recupeSearch->searchByLetter($letter); // Recherche

                // Retourne les résultats sous forme de JSON
                echo json_encode($result);
                return;
            }

            // Retourne une réponse vide si aucune donnée n'est envoyée
            http_response_code(400); // Requête incorrecte
            echo json_encode(['error' => 'Paramètre "query" manquant ou vide']);
        } catch (\Exception $e) {
            // Gestion des erreurs inattendues
            http_response_code(500); // Erreur interne du serveur
            echo json_encode(['error' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }
}
