<?php

namespace App\Models;

class RecupeSearch
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function searchByLetter(string $letter): array
    {
        if (empty($letter) || strlen($letter) > 10) {
            throw new \InvalidArgumentException('Le paramètre "letter" doit être une chaîne de 1 caractère.');
        }

        try {
            $query = $this->pdo->prepare(
                "SELECT name, id_animal, image_url 
                 FROM animals 
                 WHERE name LIKE :letter 
                 ORDER BY CASE 
                     WHEN name LIKE :exactMatch THEN 1 
                     ELSE 2 
                 END 
                 LIMIT 10"
            );
            $query->execute([
                'letter' => '%' . $letter . '%',
                'exactMatch' => $letter . '%'
            ]);
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // Gestion des erreurs PDO
            throw new \RuntimeException("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
