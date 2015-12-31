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
                    <li>Recherche vehicule</li>
                </ul>
                <h4>Recherche vehicule avec immatriculation</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
    <div class="contentpanel">
        <div class="row">
            <div class="col-md-12"> 
               <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Recherche vehicule avec immatriculation</h4>
                        </div>
                        <div class="panel-body">
                            <div id="erreur"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" id="demo1" placeholder="immatriculation" autocomplete="off" class="form-control">
                                 </div>
                            </div><!-- row -->                           
                        </div><!-- row -->
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-md-5 --> 

        <div class="row">
            <div class="col-md-5">
                <div class="table-responsive">
                              <table class="table table-hidaction table-hover">
                                <thead>
                                  <tr>
                                    <th>Factures</th>
                                  </tr>
                                </thead>
                                <tbody id="facture">
                                  
                                </tbody>
                              </table>
                              </div>
            </div>
            <div class="col-md-5 pull-right">
                <div class="table-responsive">
                              <table class="table table-hidaction table-hover">
                                <thead>
                                  <tr>
                                    <th>Devis</th>
                                  </tr>
                                </thead>
                                <tbody id="devis">
                                 
                                </tbody>
                              </table>
                              </div>
            </div>
        </div>
        </div><!-- row -->
    </div><!-- contentpanel -->
</div>
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>