<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/TypePraticien.php';

// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends ControleurSecurise {
    
    // Objet modèle Praticien
    private $praticien;
    private $typePraticien;

    public function __construct() {
        $this->praticien = new Praticien();
        $this->typePraticien = new TypePraticien();
    }

    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }
    
    // Affiche les informations détaillées sur un praticien
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    // Affiche l'interface de recherche de praticien
    public function recherche() {
        $praticiens = $this->praticien->getPraticiens();
        $praticiensType = $this->typePraticien->getTypesPraticien();
        $this->genererVue(array('praticiens' => $praticiens, 'praticiensType' => $praticiensType));
    }

    // Affiche le résultat de la recherche de praticien
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    // Affiche la liste des praticiens pour un type
    public function resultats() {
        $typePraticien = 0;
        if ($this->requete->existeParametre("id")) {
            $typePraticien = $this->requete->getParametre("id");
        }
        $nomPraticien = "";
        if ($this->requete->existeParametre("nom")) {
            $nomPraticien = $this->requete->getParametre("nom");
        }
        $villePraticien = "";
        if ($this->requete->existeParametre("ville")) {
            $villePraticien = $this->requete->getParametre("ville");
        }
        if ($typePraticien == 0)
            throw new Exception("Action impossible : il manque une restriction");
        else
            $this->afficherPraticiensType($nomPraticien, $villePraticien, $typePraticien);
    }
    
    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }
    
    // Affiche la liste des praticiens en fonction du type
    public function afficherPraticiensType($nomPraticien, $villePraticien, $typePraticien) {
        if ($typePraticien == 0)
            $praticiens = $this->praticien->getPraticiens($nomPraticien, $villePraticien);
        else
            $praticiens = $this->praticien->getPraticiens($nomPraticien, $villePraticien, $typePraticien);
        $this->genererVue(array('praticiens' => $praticiens, 'typePraticien' => $typePraticien), "index");
    }
}