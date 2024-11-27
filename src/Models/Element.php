<?php
namespace App\Models;

class Element {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Récupère tous les éléments de la table novel_character en fonction de l'id
     */
    public function getElements(int $id): array {
        $query = $this->pdo->prepare("SELECT * FROM novel_character WHERE id_character = :id");
        $query->execute(['id' => $id]);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
