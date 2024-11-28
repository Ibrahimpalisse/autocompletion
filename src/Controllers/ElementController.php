<?php

namespace App\Controllers;

use App\Models\Element;
use App\Views\View;

class ElementController
{
    private $elementModel;

    public function __construct($pdo)
    {
        $this->elementModel = new Element($pdo);
    }

    /**
     * Affiche les éléments récupérés après vérification de l'ID
     */
    public function afficher($id)
    {
        // Vérification si l'ID est valide (entier positif)
        if (!is_numeric($id) || intval($id) <= 0) {
            http_response_code(400); // Code d'erreur HTTP 400 (Bad Request)
            echo "ID invalide.";
            return;
        }

        // Récupère les éléments correspondant à l'ID
        $elements = $this->elementModel->getElements(intval($id));

        // Vérifie si des éléments ont été trouvés
        if (empty($elements)) {
            http_response_code(404); // Code d'erreur HTTP 404 (Not Found)
            echo "Aucun élément trouvé pour cet ID.";
            return;
        }

        // Rend la vue avec les éléments récupérés
        $view = new View();
        $view->render('element', [
            'title' => 'Détails des éléments',
            'elements' => $elements
        ]);
    }
}
