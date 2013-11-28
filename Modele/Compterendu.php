<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class Compterendu extends Modele {
    
    public function ajouter($idPraticien, $idVisiteur, $date_rapport, $bilan, $motif) {
        $sql = "insert into rapport_visite (id_praticien, id_visiteur, date_rapport, bilan, motif) values (?, ?, ?, ?, ?);";
        $resultat = $this->executerRequete($sql, array($idPraticien, $idVisiteur, $date_rapport, $bilan, $motif));
        return $resultat;
    }
}