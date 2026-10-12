<?php
require_once __DIR__ . '/User.php';

class Auteur extends User {
    private string $nom;
    private string $prenom;
    private string $biographie;

    public function __construct(int $id, string $email, string $mot_de_passe, string $role,
                                string $nom, string $prenom, string $biographie) {
        parent::__construct($id, $email, $mot_de_passe, $role);
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->biographie = $biographie;
    }

    // Surcharge de la méthode parent
    public function getRoleName(): string {
        return "Auteur publié";
    }

    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
}