<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class Praticien extends Modele {
    
    // Morceau de requête SQL incluant les champs de la table praticien
    private $sqlPraticien = "SELECT id_praticien as idPraticien, lib_type_praticien as typePraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien, adresse_praticien as adressePraticien, cp_praticien as cpPraticien, ville_praticien as villePraticien, coef_notoriete as coefNotoriete FROM praticien P JOIN type_praticien TP ON P.id_type_praticien = TP.id_type_praticien ";
    
    public function getPraticiens() {
        $sql = $this->sqlPraticien . 'order by nomPraticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }
    
    // Renvoie un praticien à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . 'where P.id_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }
    
    public function getTypesPraticien() {
        $sql = "SELECT id_type_praticien as idTypePraticien, lib_type_praticien as libTypePraticien FROM type_praticien ORDER BY id_type_praticien";
        $types = $this->executerRequete($sql);
        return $types;
    }
    
    public function getPraticiensType($typePraticien) {
        $sql = $this->sqlPraticien . 'where P.id_type_praticien=?';
        $praticiens = $this->executerRequete($sql, $typePraticien);
        return $praticiens;
    }
}