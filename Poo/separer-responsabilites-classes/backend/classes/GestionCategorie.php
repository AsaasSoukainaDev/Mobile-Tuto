<?php
require_once __DIR__ . '/Categorie.php';

class GestionCategorie {
    // Chemin vers le fichier JSON (à adapter selon votre structure)
    private static string $dataFile = __DIR__ . '/../../data/categories.json';

    /**
     * Lit toutes les catégories depuis le JSON
     * et retourne un tableau d'objets Categorie.
     */
    public function getAll(): array {
        if (!file_exists(self::$dataFile)) {
            return [];
        }

        $json = file_get_contents(self::$dataFile);
        $data = json_decode($json, true) ?? [];

        $categories = [];
        foreach ($data as $row) {
            $categories[] = new Categorie(
                $row['id'],
                $row['nom'],
                $row['couleur'],
                $row['icone']
            );
        }
        return $categories;
    }

    /**
     * Récupère une catégorie par son id.
     * Retourne null si non trouvée.
     */
    public function getById(int $id): ?Categorie {
        foreach ($this->getAll() as $categorie) {
            if ($categorie->getId() === $id) {
                return $categorie;
            }
        }
        return null;
    }

    /**
     * Ajoute une nouvelle catégorie dans le JSON.
     * Retourne l'objet Categorie créé.
     */
    public function create(string $nom, string $couleur, string $icone): Categorie {
        $categories = $this->getAll();

        // Calcul du nouvel id (max + 1 pour éviter les doublons après suppression)
        $nouvelId = 1;
        foreach ($categories as $c) {
            if ($c->getId() >= $nouvelId) {
                $nouvelId = $c->getId() + 1;
            }
        }

        // Création de la nouvelle entité
        $nouvelleCategorie = new Categorie($nouvelId, $nom, $couleur, $icone);

        // Sauvegarde
        $this->saveAll($categories, $nouvelleCategorie);

        return $nouvelleCategorie;
    }

    /**
     * Modifie une catégorie existante.
     * Retourne true si modifiée, false si non trouvée.
     */
    public function update(int $id, string $nom, string $couleur, string $icone): bool {
        $categories = $this->getAll();
        $trouvee = false;

        foreach ($categories as $index => $categorie) {
            if ($categorie->getId() === $id) {
                // Remplace l'objet par une version mise à jour
                $categories[$index] = new Categorie($id, $nom, $couleur, $icone);
                $trouvee = true;
                break;
            }
        }

        if ($trouvee) {
            $this->saveAll($categories);
        }

        return $trouvee;
    }

    /**
     * Supprime une catégorie par son id.
     * Retourne true si supprimée, false si non trouvée.
     */
    public function delete(int $id): bool {
        $categories = $this->getAll();
        $nouvellesCategories = [];
        $trouvee = false;

        foreach ($categories as $categorie) {
            if ($categorie->getId() === $id) {
                $trouvee = true; // On ne l'ajoute pas → supprimée
            } else {
                $nouvellesCategories[] = $categorie;
            }
        }

        if ($trouvee) {
            $this->saveAll($nouvellesCategories);
        }

        return $trouvee;
    }

    /**
     * Sauvegarde toutes les catégories dans le fichier JSON.
     * Méthode privée utilisée par create(), update() et delete().
     */
    private function saveAll(array $categories, ?Categorie $nouvelle = null): void {
        $data = [];

        // Ajoute les catégories existantes
        foreach ($categories as $categorie) {
            $data[] = [
                'id'      => $categorie->getId(),
                'nom'     => $categorie->getNom(),
                'couleur' => $categorie->getCouleur(),
                'icone'   => $categorie->getIcone()
            ];
        }

        // Ajoute la nouvelle catégorie si fournie (cas de create)
        if ($nouvelle !== null) {
            $data[] = [
                'id'      => $nouvelle->getId(),
                'nom'     => $nouvelle->getNom(),
                'couleur' => $nouvelle->getCouleur(),
                'icone'   => $nouvelle->getIcone()
            ];
        }

        // Crée le dossier data/ s'il n'existe pas
        $dossier = dirname(self::$dataFile);
        if (!is_dir($dossier)) {
            mkdir($dossier, 0777, true);
        }

        // Écrit dans le fichier JSON
        file_put_contents(
            self::$dataFile,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }
}
?>