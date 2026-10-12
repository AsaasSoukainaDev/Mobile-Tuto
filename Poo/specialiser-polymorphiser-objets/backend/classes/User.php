<?php
class User {
    protected int $id;
    protected string $email;
    protected string $mot_de_passe;
    protected string $role;

    public function __construct(int $id, string $email, string $mot_de_passe, string $role) {
        $this->id = $id;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->role = $role;
    }

    public function getRoleName(): string {
        return "Visiteur anonyme";
    }

    // Getters (optionnels mais utiles)
    public function getId(): int { return $this->id; }
    public function getEmail(): string { return $this->email; }
}