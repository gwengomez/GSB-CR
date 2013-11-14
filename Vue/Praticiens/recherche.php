<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Recherche d'un praticien</h2>
    <div class="well">
        <div class="form-group">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#simple" data-toggle="tab">Recherche</a></li>
                <li><a href="#avance" data-toggle="tab">Recherche avancée</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="simple">
                <form class="form-horizontal" role="form" action="praticiens/resultat" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Nom du praticien</label>
                        <div class="col-sm-5 col-md-4">
                            <select class="form-control" name="id">
                                <?php foreach ($praticiens as $praticien) : ?>
                                    <option value="<?= $this->nettoyer($praticien['idPraticien']) ?>"><?= $this->nettoyer($praticien['nomPraticien']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-5">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="avance">
                <form class="form-horizontal" role="form" action="praticiens/resultats" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Nom</label>
                        <div class="col-sm-5 col-md-4">
                            <input name="nom" type="text" class="form-control" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Ville</label>
                        <div class="col-sm-5 col-md-4">
                            <input name="nom" type="text" class="form-control">
                        </div>
                        </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Type de praticien</label>
                        <div class="col-sm-5 col-md-4">
                            <select class="form-control" name="id">
                                <option value="0">Tous les types</option>
                                <?php foreach ($praticiensType as $praticien) : ?>
                                    <option value="<?= $this->nettoyer($praticien['idTypePraticien']) ?>"><?= $this->nettoyer($praticien['libTypePraticien']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-5">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

