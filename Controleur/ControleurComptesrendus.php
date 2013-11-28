<?php
require_once 'Modele/Praticien.php';
require_once 'Modele/Compterendu.php';
require_once 'Controleur/ControleurSecurise.php';


// Contrôleur de l'accueil
class ControleurComptesrendus extends ControleurSecurise {
    
    private $praticien;
    private $compterendu;
    
    public function __construct() {
        $this->praticien = new Praticien();
        $this->compterendu = new Compterendu();
    }
    
    // Affiche la page d'accueil
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }
    
    public function ajouter() {
        $idPraticien = "";
        if ($this->requete->existeParametre("idPraticien")) {
            $idPraticien = $this->requete->getParametre("idPraticien");
        }
        $idVisiteur = "";
        if ($this->requete->getSession()->existeAttribut("idVisiteur")) {
            $idVisiteur = $this->requete->getSession()->getAttribut("idVisiteur");
        }
        $date_rapport = "";
        if ($this->requete->existeParametre("date")) {
            $date_rapport = $this->requete->getParametre("date");
        }
        $bilan = "";
        if ($this->requete->existeParametre("bilan")) {
            $bilan = $this->requete->getParametre("bilan");
        }
        $motif = "";
        if ($this->requete->existeParametre("motif")) {
            $motif = $this->requete->getParametre("motif");
        }
        $resultat = $this->compterendu->ajouter($idPraticien, $idVisiteur, $date_rapport, $bilan, $motif);
        $this->genererVue(array('resultat' => $resultat));
    }
}