<?php
    require_once("./categorie.php");
    $cat1 = new Categorie(1,"Design UI/UX","red","iconeA");
    $cat2 = new Categorie(2,"DEV mobile","bleu","iconeB");
    
    echo $cat1->getColeur();
    echo $cat2->getNom();
?>