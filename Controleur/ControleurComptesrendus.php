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
        $comptesRendus = $this->compterendu->getComptesRendus();
        $this->genererVue(array('comptesRendus' => $comptesRendus));
    }
    
    public function ajout() {
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
    
    public function supprimer() {
        if ($this->requete->existeParametre("id")) {
            $idRapport = $this->requete->getParametre("id");
            $resultat = $this->compterendu->supprimer($idRapport);
            $this->rediriger("comptesrendus");
        }
        else
            throw new Exception("Aucun id défini");
    }
    
    public function modification() {
        if ($this->requete->existeParametre("id")) {
            $idRapport = $this->requete->getParametre("id");
            $details = $this->compterendu->getCompteRendu($idRapport);
            $this->genererVue(array('details' => $details));
        }
        else
            throw new Exception("Aucun id défini");
    }
    
    public function modifier() {
        if ($this->requete->existeParametre("idCR")) {
            $idRapport = $this->requete->getParametre("idCR");
            $motif = $this->requete->getParametre("motif");
            $bilan = $this->requete->getParametre("bilan");
            $resultat = $this->compterendu->modifier($idRapport, $motif, $bilan);
            $this->genererVue(array('$resultat' => $resultat));
        }
        else
            throw new Exception("Aucun id défini");
    }
}