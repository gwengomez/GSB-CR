<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class Compterendu extends Modele {
    private $sqlSelect = "select * from rapport_visite rp join praticien p on rp.id_praticien = p.id_praticien join visiteur v on rp.id_visiteur = v.id_visiteur ";
    
    public function ajouter($idPraticien, $idVisiteur, $date_rapport, $bilan, $motif) {
        $sql = "insert into rapport_visite (id_praticien, id_visiteur, date_rapport, bilan, motif) values (?, ?, ?, ?, ?);";
        $resultat = $this->executerRequete($sql, array($idPraticien, $idVisiteur, $date_rapport, $bilan, $motif));
        return $resultat;
    }
    
    public function getCompteRendu($idRapport) {
        $sql = $this->sqlSelect."where id_rapport=?";
        $compteRendu = $this->executerRequete($sql, array($idRapport));
        if ($compteRendu->rowCount() == 1)
            return $compteRendu->fetch();
        else
            throw new Exception("Aucun compte-rendu ne correspond à l'identifiant '$idRapport'");
    }
            
    public function getComptesRendus() {
        $sql = $this->sqlSelect."order by rp.id_praticien;";
        $comptesRendus = $this->executerRequete($sql);
        return $comptesRendus;
    }
    
    public function supprimer($idCompteRendu) {
        $sql = "delete from rapport_visite where id_rapport=?";
        $resultat = $this->executerRequete($sql, array($idCompteRendu));
        return $resultat;
    }
    
    public function modifier($idRapport, $motif, $bilan) {
        $sql = "update rapport_visite set bilan='?', motif='?' where id_rapport=?";
        $resultat = $this->executerRequete($sql, array($bilan, $motif, $idRapport));
        if ($resultat != null)
            return $resultat;
        else
            throw new Exception('ERREUR !');
    }
}