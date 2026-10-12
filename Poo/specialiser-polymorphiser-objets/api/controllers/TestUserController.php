<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../backend/classes/User.php';
require_once __DIR__ . '/../../backend/classes/Auteur.php';

// Tableau contenant les deux types d'objets
$utilisateurs = [
    new User(1, "visiteur@blog.com", "pass123", "visiteur"),
    new Auteur(2, "auteur@blog.com", "pass456", "auteur", "Dupont", "Marie", "Passionnée de tech.")
];

// Polymorphisme : la même méthode produit des résultats différents
foreach ($utilisateurs as $u) {
    echo $u->getRoleName() . "<br>";
}