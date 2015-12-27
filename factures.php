<?php // include db connect class
session_start();
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/header.php'; ?>
<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-th-list"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="#">Factures</a></li>
                </ul>
                <h4>Factures</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
    
    <div class="contentpanel">
        <div class="panel panel-primary-head">
            <div>
                <?php
                if (isset($_SESSION['success'])) {
                 
                 if ($_SESSION['success'] == 1) { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong><?php echo $_SESSION['message'];  $_SESSION['message']="";$_SESSION['success']=""; ?></strong>
                    </div>
                <?php } elseif ($_SESSION['success'] == 2){ ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong><?php echo $_SESSION['message']; $_SESSION['message']="";$_SESSION['success']=""; ?></strong>
                    </div>
                <?php } 
                }
                ?>
                

                
            </div>

            <?php 
            $t=0;
            $p=0;
            $n=0;
             ?>
            <div class="col-md-6">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tous" data-toggle="tab"><strong>Tout afficher</strong></a></li>
                    <li class=""><a href="#payee" data-toggle="tab"><strong>Payée</strong></a></li>
                    <li class=""><a href="#nonpayee" data-toggle="tab"><strong>Non payée</strong></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content mb30">
                    <div class="tab-pane active" id="tous">
                        <table id="basicTable1" class="table table-striped table-bordered responsive">
                            <thead class="">
                                <tr>
                                    <th>Numero de facture</th>
                                    <th>date de la facture</th>
                                    <th>Nom et Prenom</th>
                                    <th>Immatriculation</th>
                                    <th>Marque de voiture</th>
                                    <th>Total</th>
                                    <th>Etat</th>
                                    <th>Impression</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $factures= getAllFactures(-1);
                                  foreach($factures as $facture){ 
                                    $t+=$facture['total'];
                                    ?> 
                                        <tr>
                                          <td># <?php echo $facture['id']; ?> </td>
                                          <td><?php echo $facture['created']; ?> </td>
                                          <td><?php echo $facture['nom'].' '.$facture['prenom']; ?> </td>
                                          <td><?php echo $facture['immatriculation']; ?> </td>
                                          <td><?php echo $facture['marque']; ?> </td>
                                          <td><?php echo $facture['total']; ?> DH </td>
                                          <td class="center">
                                            <?php if ($facture['etat']==1): ?>
                                              <a class="btn btn-success btn-rounded" href="valider.php?id=<?php echo $facture['id']; ?>&etat=0"><i class="fa fa-thumbs-o-up"></i></a>
                                            <?php else: ?>
                                              <a class="btn btn-warning btn-rounded" href="valider.php?id=<?php echo $facture['id']; ?>&etat=1"><i class="fa fa-thumbs-o-down"></i></a>  
                                            <?php endif ?>
                                          </td> 
                                          <td class="center"><a class="btn btn-primary blue_b btn-rounded" href="pdf.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-file-pdf-o"></i></a></td> 
                                          <td class="center"><a class="btn btn-primary blue_b btn-rounded" href="modifier_facture.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-edit"></i></a></td> 
                                          <td class="center"><a class="btn btn-danger btn-rounded" href="php_supprimer_facture.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-trash-o"></i></a></td> 
                                      </tr>
                                    <?php } ?> 
                            </tbody>
                        </table>
                        <button class="btn btn-rounded btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">chiffre d'affaire pour tout factures</button>
                    </div><!-- tab-pane -->
                  
                    <div class="tab-pane" id="payee">
                        <table id="basicTable2" class="table table-striped table-bordered responsive">
                            <thead class="">
                                <tr>
                                    <th>Numero de facture</th>
                                    <th>date de la facture</th>
                                    <th>Nom et Prenom</th>
                                    <th>Immatriculation</th>
                                    <th>Marque de voiture</th>
                                    <th>Total</th>
                                    <th>Etat</th>
                                    <th>Impression</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $factures= getAllFactures(1);
                                  foreach($factures as $facture){ 
                                    $p+=$facture['total'];
                                    ?> 
                                        <tr>
                                          <td># <?php echo $facture['id']; ?> </td>
                                          <td><?php echo $facture['created']; ?> </td>
                                          <td><?php echo $facture['nom'].' '.$facture['prenom']; ?> </td>
                                          <td><?php echo $facture['immatriculation']; ?> </td>
                                          <td><?php echo $facture['marque']; ?> </td>
                                          <td><?php echo $facture['total']; ?> DH </td>
                                          <td class="center">
                                            <?php if ($facture['etat']==1): ?>
                                              <a class="btn btn-success btn-rounded" href="valider.php?id=<?php echo $facture['id']; ?>&etat=0"><i class="fa fa-thumbs-o-up"></i></a>
                                            <?php else: ?>
                                              <a class="btn btn-warning btn-rounded" href="valider.php?id=<?php echo $facture['id']; ?>&etat=1"><i class="fa fa-thumbs-o-down"></i></a>  
                                            <?php endif ?>
                                          </td> 
                                          <td class="center"><a class="btn btn-primary blue_b btn-rounded" href="pdf.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-file-pdf-o"></i></a></td> 
                                          <td class="center"><a class="btn btn-primary blue_b btn-rounded" href="modifier_facture.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-edit"></i></a></td> 
                                          <td class="center"><a class="btn btn-danger btn-rounded" href="php_supprimer_facture.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-trash-o"></i></a></td> 
                                      </tr>
                                    <?php } ?> 
                            </tbody>
                        </table>
                        <button class="btn btn-rounded btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bs-example-modal-lg1">chiffre d'affaire pour les factures payée</button>
                    </div><!-- tab-pane -->
                  
                    <div class="tab-pane" id="nonpayee">
                    <table id="basicTable3" class="table table-striped table-bordered responsive">
                            <thead class="">
                                <tr>
                                    <th>Numero de facture</th>
                                    <th>date de la facture</th>
                                    <th>Nom et Prenom</th>
                                    <th>Immatriculation</th>
                                    <th>Marque de voiture</th>
                                    <th>Total</th>
                                    <th>Etat</th>
                                    <th>Impression</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $factures= getAllFactures(0);
                                  foreach($factures as $facture){ 
                                    $n+=$facture['total'];
                                    ?> 
                                        <tr>
                                          <td># <?php echo $facture['id']; ?> </td>
                                          <td><?php echo $facture['created']; ?> </td>
                                          <td><?php echo $facture['nom'].' '.$facture['prenom']; ?> </td>
                                          <td><?php echo $facture['immatriculation']; ?> </td>
                                          <td><?php echo $facture['marque']; ?> </td>
                                          <td><?php echo $facture['total']; ?> DH </td>
                                          <td class="center">
                                            <?php if ($facture['etat']==1): ?>
                                              <a class="btn btn-success btn-rounded" href="valider.php?id=<?php echo $facture['id']; ?>&etat=0"><i class="fa fa-thumbs-o-up"></i></a>
                                            <?php else: ?>
                                              <a class="btn btn-warning btn-rounded" href="valider.php?id=<?php echo $facture['id']; ?>&etat=1"><i class="fa fa-thumbs-o-down"></i></a>  
                                            <?php endif ?>
                                          </td> 
                                          <td class="center"><a class="btn btn-primary blue_b btn-rounded" href="pdf.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-file-pdf-o"></i></a></td> 
                                          <td class="center"><a class="btn btn-primary blue_b btn-rounded" href="modifier_facture.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-edit"></i></a></td> 
                                          <td class="center"><a class="btn btn-danger btn-rounded" href="php_supprimer_facture.php?id=<?php echo $facture['id']; ?>"><i class="fa fa-trash-o"></i></a></td> 
                                      </tr>
                                    <?php } ?> 
                            </tbody>
                        </table>    
                        <button class="btn btn-rounded btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bs-example-modal-lg2">chiffre d'affaire pour les factures non payée</button>
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
                
            </div>


            <section>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Chiffre d'affaire</h4>
                          </div>
                          <div class="modal-body">chiffre d'affaire pour tout factures : <?php echo $t ?> DH</div>
                      </div>
                    </div>
                </div>

                <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Chiffre d'affaire</h4>
                          </div>
                          <div class="modal-body">chiffre d'affaire pour les factures payée : <?php echo $p ?> DH</div>
                      </div>
                    </div>
                </div>

                <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Chiffre d'affaire</h4>
                          </div>
                          <div class="modal-body">chiffre d'affaire pour les factures non payée : <?php echo $n ?> DH</div>
                      </div>
                    </div>
                </div>
            </section>
            
        </div><!-- panel -->
        <br />
    </div><!-- contentpanel -->
</div><!-- mainpanel -->
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>