<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';

// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends Controleur {
    
    // Objet modèle Praticien
    private $praticien;

    public function __construct() {
        $this->praticien = new Praticien();
    }

    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }
}