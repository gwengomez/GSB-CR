<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class TypePraticien extends Modele {

public function getTypesPraticien() {
        $sql = "SELECT id_type_praticien as idTypePraticien, lib_type_praticien as libTypePraticien FROM type_praticien ORDER BY id_type_praticien";
        $types = $this->executerRequete($sql);
        return $types;
    }
}
