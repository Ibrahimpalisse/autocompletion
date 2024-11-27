<?php
namespace App\Models;

class RecupeSearch {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function searchByFirstLetter(string $letter): array {
        $query = $this->pdo->prepare(
            "SELECT name, id_character, image_url 
             FROM novel_character 
             WHERE name LIKE :letter 
             LIMIT 10"
        );
        $query->execute(['letter' => $letter . '%']);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
