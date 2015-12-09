<?php // include db connect class
session_start();
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/header.php'; ?>
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-plus"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="produits.php">Produits</a></li>
                    <li>Ajout d'un produit</li>
                </ul>
                <h4>Ajout d'un produit</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
    <div class="contentpanel">
        <div class="row">
            <div class="col-md-12"> 
                <form>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Ajouter un produit</h4>
                    </div>
                    <div class="panel-body">
                        <div id="erreur"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Référence</label>
                                    <input type="text" name="ref" id="ref" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nom du produit</label>
                                    <input type="text" name="nom" id="nom" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Quantite</label>
                                    <input type="number" name="qte" id="qte" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Quantite minimal</label>
                                    <input type="number" name="qte_min" id="qte_min" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Prix</label>
                                    <input type="number" name="prix" id="prix" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary" id="add_produit" style="background-color:#1C65A5;">Ajouter</button>
                        <button type="reset" class="btn btn-default">Annuler</button>
                    </div><!-- panel-footer -->
                    </form>
                </div><!-- panel -->
            </div><!-- col-md-6 --> 
        </div><!-- row -->
    </div><!-- contentpanel -->
</div>
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>