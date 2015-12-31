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
                    <li><a href="vehicules.php">Vehicules</a></li>
                    <li>Ajout d'une vehicule</li>
                </ul>
                <h4>Ajout d'une vehicule</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
    <div class="contentpanel">
        <div class="row">
            <div class="col-md-12"> 
                <form>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Ajouter une vehicule</h4>
                    </div>
                    <div class="panel-body">
                        <div id="erreur"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Prenom</label>
                                    <input type="text" name="prenom" id="prenom" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Immatriculation</label>
                                    <input type="text" name="mat" id="mat" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Marque</label>
                                    <input type="text" name="marque" id="marque" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Numero chassis</label>
                                    <input type="text" name="chassis" id="chassis" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Carte grise</label>
                                    <input type="text" name="grise" id="grise" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Assurance</label>
                                    <input type="text" name="ass" id="ass" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Expére</label>
                                    <input type="text" name="exp" id="exp" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Date entrée</label>
                                    <input type="date" name="de" id="de" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Date sortie</label>
                                    <input type="date" name="ds" id="ds" class="form-control" />
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary" id="add_vehicule" style="background-color:#1C65A5;">Ajouter</button>
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