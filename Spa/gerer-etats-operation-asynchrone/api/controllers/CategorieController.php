<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../../backend/classes/GestionCategorie.php';

$gestion = new GestionCategorie();
$methode = $_SERVER['REQUEST_METHOD'];

// ============================================
// GET : Récupérer toutes les catégories
// ============================================
if ($methode === 'GET') {
    $categories = $gestion->getAll();

    $data = [];
    foreach ($categories as $cat) {
        $data[] = [
            'id'      => $cat->getId(),
            'nom'     => $cat->getNom(),
            'couleur' => $cat->getCouleur(),
            'icone'   => $cat->getIcone()
        ];
    }

    echo json_encode($data);
}

// ============================================
// POST : Ajouter une nouvelle catégorie
// ============================================
elseif ($methode === 'POST') {
    $nom     = $_POST['nom']     ?? null;
    $couleur = $_POST['couleur'] ?? null;
    $icone   = $_POST['icone']   ?? null;

    if ($nom && $couleur && $icone) {
        try {
            $nouvelle = $gestion->create($nom, $couleur, $icone);

            echo json_encode([
                'success' => true,
                'id'      => $nouvelle->getId(),
                'nom'     => $nouvelle->getNom(),
                'couleur' => $nouvelle->getCouleur(),
                'icone'   => $nouvelle->getIcone()
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    } else {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Tous les champs sont obligatoires',
            'recu'    => $_POST
        ]);
    }
}

// ============================================
// Autres méthodes non supportées
// ============================================
else {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Méthode non autorisée'
    ]);
}
?>