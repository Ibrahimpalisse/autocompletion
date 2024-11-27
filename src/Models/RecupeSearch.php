<?php
namespace App\Models;

class RecupeSearch {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function searchByFirstLetter(string $letter): array {
        if (empty($letter) || strlen($letter) > 1) {
            throw new \InvalidArgumentException('Le paramètre "letter" doit être une chaîne de 1 caractère.');
        }

        try {
            $query = $this->pdo->prepare(
                "SELECT name, id_animal, image_url 
                 FROM animals 
                 WHERE name LIKE :letter 
                 LIMIT 10"
            );
            $query->execute(['letter' => $letter . '%']);
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // Gestion des erreurs PDO
            throw new \RuntimeException("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
