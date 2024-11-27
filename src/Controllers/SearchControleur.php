<?php
namespace App\Controllers;

use App\Models\RecupeSearch;
use App\Views\View;

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

        // Vérifie si la requête POST contient 'letter'
        if (!empty($_GET['query'])) {
            $letter = htmlspecialchars($_GET['query']); // Sécurise l'entrée utilisateur
            $result = $this->recupeSearch->searchByFirstLetter($letter); // Recherche
            echo json_encode($result);
            return; // Stoppe l'exécution pour ne pas rendre la vue
        }

        // Retourne une réponse vide si aucune donnée
        echo json_encode([]);
    }
 
}
