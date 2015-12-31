<?php // include db connect class
session_start();
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/header.php'; ?>
<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-plus"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="produits.php">Devis</a></li>
                    <li>Générer un devis</li>
                </ul>
                <h4>Générer un devis</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
<div class="contentpanel">
        <div class="row">
            <div class="col-md-12"> 
                <form action="php_ajouter_devis.php" method="POST">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="mb30"  id="erreur"></div>
                    </div>
                    <div class="panel-body">
                        <?php 
                        if (isset($_GET['id'])) {
                            $vehicule= getVehiculeByID($_GET['id']);
                            
                            if (!$vehicule) {
                                echo("<script>location.href = 'factures.php';</script>");
                            }
                        }
                        ?>
                        <div class="row">
                            <input type="hidden" name="vehicule" value="<?php echo $_GET['id'] ?>">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nom et Prenom</label>
                                    <input type="text" name="nom"  readonly="readonly" class="form-control" value="<?php echo ($vehicule['nom'].' '.$vehicule['prenom']); ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">Marque</label>
                                    <input type="text" name="marque" class="form-control" readonly="readonly" style="height: 41px;" value="<?php echo $vehicule['marque']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">Immatriculation</label>
                                    <input type="text" name="immatriculation" readonly="readonly" class="form-control" value="<?php echo $vehicule['immatriculation']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">Assurance</label>
                                    <input type="text" name="assurance" readonly="readonly" class="form-control" value="<?php echo $vehicule['assurance']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->

            
                        </div><!-- row -->

                        <div class="row col">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="control-label">Designation</label>
                                    <input type="text" name="designation[]" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-3 -->
                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">Quantité</label>
                                    <input type="number" name="qte[]" class="qte form-control" value=""/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">Prix  U.T HT</label>
                                    <input type="number" name="prix[]" class="prix form-control" value=""/>
                                 </div><!-- form-group -->
                            </div><!-- col-sm-2 -->


                            
                        </div><!-- row -->


                        <div class="row">
                            <div class="col-sm-4 pull-right">
                               <button type="button" class="btn btn-primary btn-block" id="add_col2">Ajouter</button>
                            </div></div>
                        </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary  btn-lg btn-block" id="confirm_facture" value="Enregestrer">
                    </div><!-- panel-footer -->
                    </form>
                </div><!-- panel -->
            </div><!-- col-md-6 --> 
        </div><!-- row -->
    </div><!-- contentpanel -->
</div>
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>