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
                    <li>Générer une facture</li>
                </ul>
                <h4>Générer une facture</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
<div class="contentpanel">
        <div class="row">
            <div class="col-md-12"> 
                <form action="php_ajouter_facture.php" method="POST" id="target">
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
                            <div class="col-sm-4">
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

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <br>
                                    <br>
                                    <div class="ckbox ckbox-success">
                                        <input type="checkbox" id="checkboxSuccess" name="etat" checked="checked">
                                        <label for="checkboxSuccess">Etat facture</label>
                                    </div>
                                </div>
                            </div><!-- col-sm-2 -->
                        </div><!-- row -->

                        <div class="row col">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Designation</label>
                                    <input type="text" name="designation[]" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-3 -->
                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">Quantité</label>
                                    <input type="number" name="qte[]" class="qte form-control" onkeyup="myFunction()" value=""/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">Prix  U.T HT</label>
                                    <input type="number" name="prix[]" id="prix" class="form-control" onkeyup="myFunction()" value=""/>
                                 </div><!-- form-group -->
                            </div><!-- col-sm-2 -->


                            <div class="col-sm-2">
                                <div class="form-group">
                                    <br>
                                    <br>
                                    <div class="checkbox block"><label><input name="occ[]" value="0" type="checkbox"> Occasion</label></div>
                                </div>
                            </div><!-- col-sm-2 -->

                        </div><!-- row -->


                        <div class="row">
                            <div class="col-sm-6"></div>
                            <a href="" class="btn btn-info col-sm-2" id="growl-info"><span id="total">0</span> DH</a>

                            <div class="col-sm-4 pull-right">
                               <button type="button" class="btn btn-primary btn-block" id="add_col">Ajouter</button>
                            </div></div>
                        </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <input type="button" class="btn btn-primary  btn-lg btn-block" data-toggle="modal" data-target=".bs-example-modal" value="Enregistrer">
                    </div><!-- panel-footer -->

                    <section>
                      <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content"><div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Entrer le code de securite</h4>
                          </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <div class="col-sm-8">
                                <input type="text" name="code" id="code" placeholder="code de securite" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                <button type="button" class="btn btn-danger mr5"  id="confirm_facture" >Confirmer</button>              
                                </div>
                                </div><!-- form-group -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>

                    </form>
                </div><!-- panel -->
            </div><!-- col-md-6 --> 
        </div><!-- row -->
    </div><!-- contentpanel -->
</div>

<script>
function myFunction() {
var qte = document.getElementsByName("qte[]");
var prix = document.getElementsByName("prix[]");

var i;
var total=0;

for (i = 0; i < prix.length; i++) {
    total=total+(prix[i].value*qte[i].value);
}

document.getElementById("total").innerHTML = total;

}
</script>



<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>