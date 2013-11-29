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
            $idVisiteur = $this->requete->getSession()->getAttribut("idVisiteur");
            $date_rapport = $this->requete->getParametre("date");
            $bilan = $this->requete->getParametre("bilan");
            $motif = $this->requete->getParametre("motif");
            $resultat = $this->compterendu->ajouter($idPraticien, $idVisiteur, $date_rapport, $bilan, $motif);
            $this->genererVue(array('resultat' => $resultat));
        }
        else
            throw new Exception("Veuillez passer par le formulaire d'ajout !");
    }
}