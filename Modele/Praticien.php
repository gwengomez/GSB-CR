<?php

require_once 'Framework/Modele.php';

// Services métier liés aux médicaments 
class Praticien extends Modele {
    
    // Morceau de requête SQL incluant les champs de la table médicament
    private $sqlPraticien = "SELECT lib_type_praticien, nom_praticien, prenom_praticien, adresse_praticien, cp_praticien, ville_praticien, coef_notoriete FROM praticien P JOIN type_praticien TP WHERE P.id_type_praticien = TP.id_type_praticien ";
    
    public function getPraticiens() {
        $sql = $this->sqlPraticien . ' order by nom_praticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }
    
    // Renvoie un médicament à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . ' where id_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }
}