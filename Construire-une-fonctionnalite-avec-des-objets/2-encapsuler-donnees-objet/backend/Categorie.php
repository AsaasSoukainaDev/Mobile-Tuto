<?php
    class Categorie {

        public int  $id;
        public string  $nom;
        public string  $couleur;
        public string  $icone;

        public function __construct(int $id,string $nom,string $couleur,string $icone){
            $this->id=$id;
            $this->nom=$nom;
            $this->couleur=$couleur;
            $this->icone=$icone;
        }

        public function getID() : int {
            return $this->id;
        }

        public function getNom() : string {
            return $this->nom;
        }

        public function getColeur() : string {
            return $this->couleur;
        }

        public function getIcone() : string {
            return $this->icone;
        }

        public function setNom(string $value) : void {
            $this->nom=$value;
        }

        public function setColeur(string $value) : void {
            $this->couleur=$value;
        }

        public function setIcone(string $value) : void {
            $this->icone=$value;
        }

        public function afficher() {
        echo $this->nom."-".$this->couleur."-".$this->icone;
    }
    }
?>
<?php
    class Categorie {

        public  $id;
        public  $nom;
        public  $couleur;
        public  $icone;

        public function __construct($id, $nom, $couleur, $icone){
            $this->id=$id;
            $this->nom=$nom;
            $this->couleur=$couleur;
            $this->icone=$icone;
        }

        public function getId() :int {
            return $this->$id;
        }
        public function getNom() :string {
            return $this->$nom;
        }
        public function getColeur() :string {
            return $this->$couleur;
        }
        public function getIcone() :string {
            return $this->$icone;
        }
        public function setId() :void {
            $this->$id;
        }

        public function setNom() :void {
            $this->$nom;
        }
        public function setColeur() :void {
            $this->$couleur;
        }
        public function setIcone() :void {
            $this->$icone;
        }
        public function afficher() {
            echo $this->nom."-".$this->couleur."-".$this->icone;
        }
    }
?>




