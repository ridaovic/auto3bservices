<?php // include db connect class
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/header.php'; ?>
<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-pencil"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="produits.php">Produits</a></li>
                    <li>Modifier Produit</li>
                </ul>
                <h4>Modifier Produit</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
    <div class="contentpanel">
        <div class="row">
            <div class="col-md-12"> 
                <form>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="mb30"  id="erreur"></div>
                    </div>
                    <div class="panel-body">
                        <?php 
                        if (isset($_GET['ref'])) {
                            $produit= getProduct($_GET['ref']);
                            if (!$produit) {
                                echo("<script>location.href = 'produits.php';</script>");
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Référence</label>
                                    <input type="text" name="ref" id="ref" class="form-control" value="<?php echo $produit['ref']; ?>" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nom du produit</label>
                                    <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $produit['nom']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Quantite</label>
                                    <input type="number" name="qte" id="qte" class="form-control" value="<?php echo $produit['qte']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Quantite minimal</label>
                                    <input type="number" name="qte_min" id="qte_min" class="form-control" value="<?php echo $produit['qte_min']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Prix</label>
                                    <input type="number" name="prix" id="prix" class="form-control" value="<?php echo $produit['prix']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary" id="edit_produit">Modifier</button>
                    </div><!-- panel-footer -->
                    </form>
                </div><!-- panel -->
            </div><!-- col-md-6 --> 
        </div><!-- row -->
    </div><!-- contentpanel -->
</div>
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>