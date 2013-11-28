<?php $this->titre = "Comptes-rendus"; 
$menuComptesRendus = true;
require 'Vue/_Commun/navigation.php'; ?>

<div class="container">
    <?php if ($resultat != null) { ?>
    <div class="alert alert-success">
        Le compte-rendu a été ajouté avec succès.
    </div>
    <?php } else { ?>
    <div class="alert alert-warning">
        Le compte-rendu n'a pas pu être ajouté.
    </div>
    <?php } ?>
</div>