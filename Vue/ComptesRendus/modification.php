<?php $this->titre = "Comptes-rendus"; 
$menuComptesRendus = true;
require 'Vue/_Commun/navigation.php'; ?>

<div class="container">
    <h2 class="text-center">Modification d'un compte-rendu de visite</h2>
    <div class="well">
        <form class="form-horizontal" role="form" action="comptesrendus/modifier" method="post">
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Date</label>
                <div class="col-sm-7">
                    <p class="form-control-static"><?= $this->nettoyer($details['date_rapport']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Praticien</label>
                <div class="col-sm-7">
                    <p class="form-control-static"><?= $this->nettoyer($details['nom_praticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Motif</label>
                <div class="col-sm-5 col-md-4">
                    <textarea name="motif" class="form-control" rows="2" required autofocus><?= $this->nettoyer($details['motif']) ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Bilan</label>
                <div class="col-sm-5 col-md-4">
                    <textarea name="bilan" class="form-control" rows="4" required><?= $this->nettoyer($details['bilan']) ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-5">
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-edit"></span> Mettre à jour</button>
                </div>
            </div>
            <input type="hidden" name="idCR" value="<?= $details['id_rapport'] ?>" />
        </form>
    </div>
</div>