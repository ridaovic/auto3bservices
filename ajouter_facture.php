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
                    <li><a href="produits.php">Factures</a></li>
                    <li>Ajout d'une facture</li>
                </ul>
                <h4>Ajout d'une facture</h4>
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
                        if (isset($_GET['num_fact'])) {
                            $facture= getFacture($_GET['num_fact']);
                            if (!$facture) {
                                echo("<script>location.href = 'factures.php';</script>");
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Numéro de facture</label>
                                    <input type="text" name="num_fact" id="num_fact" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                             <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Prénom</label>
                                    <input type="text" name="prenom" id="prenom" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Date</label>
                                    <input type="date" name="date_fact" id="date_fact" class="form-control" style="height: 41px;"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Immatriculation</label>
                                    <input type="text" name="immatriculation" id="immatriculation" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Marque de la voiture</label>
                                    <input type="text" name="marque_voiture" id="marque_voiture" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Désignation</label>
                                    <input type="text" name="designation" id="designation" class="form-control" style="height: 41px;"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                             <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">État</label>
                                    <select type="text" name="etat_facture" id="etat_facture" class="form-control" style="height: 41px;">
                                        <option></option>
                                        <option>Payé</option>
                                        <option>Non payé</option>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Quantité</label>
                                    <input type="number" name="qte" id="qte" class="form-control" value="<?php echo $facture['qte']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->

                           <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Prix  U.T HT</label>
                                    <input type="number" name="prix" id="prix" class="form-control" value="<?php echo $facture['prix']; ?>" style="height: 41px;"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Montant HT</label>
                                    <input type="number" name="montant" id="montant" class="form-control" value="<?php echo $facture['montant']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Total</label>
                                    <input type="number" name="total" id="total" class="form-control" value="<?php echo $facture['total']; ?>"/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->

                        </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary" id="add_facture">Ajouter</button>
                    </div><!-- panel-footer -->
                    </form>
                </div><!-- panel -->
            </div><!-- col-md-6 --> 
        </div><!-- row -->
    </div><!-- contentpanel -->
</div>
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>