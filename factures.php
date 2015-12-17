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

            <table id="basicTable" class="table table-striped table-bordered responsive">
                <thead class="">
                    <tr>
                        <th>Numero de facture</th>
                        <th>date de la facture</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Immatriculation</th>
                        <th>Marque de voiture</th>
                        <th>Désignation</th>
                        <th>Quantité</th>
                        <th>État</th>
                        <th>Prix U.T HT</th>
                        <th>Montant HT</th>
                        <th>Total</th>
                        <th>Modification</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $factures= getAllFactures();
                      foreach($factures as $facture){ ?> 
                            <tr>
                              <td><?php echo $facture['num_fact']; ?> </td>
                              <td><?php echo $facture['date_fact']; ?> </td>
                              <td><?php echo $facture['nom']; ?> </td>
                              <td><?php echo $facture['prenom']; ?> </td>
                              <td><?php echo $facture['immatriculation']; ?> </td>
                              <td><?php echo $facture['marque_voiture']; ?> </td>
                              <td><?php echo $facture['designation']; ?> </td>
                              <td><?php echo $facture['qte']; ?> </td>
                              <td><?php echo $facture['etat_facture']; ?> </td>
                              <td><?php echo $facture['prix']; ?> </td>
                              <td><?php echo $facture['montant']; ?> </td>
                              <td><?php echo $facture['total']; ?> </td>
                              <td class="center"><a class="btn btn-primary blue_b" href="modifier_facture.php?num_fact=<?php echo $facture['num_fact']; ?>"><i class="fa fa-edit"></i></a></td>
                              <td class="center"><a class="btn btn-primary blue_b" href="php_supprimer_facture.php?num_fact=<?php echo $facture['num_fact']; ?>"><i class="fa fa-trash-o"></i></a></td>
                          </tr>
                        <?php } ?> 
                </tbody>
            </table>
        </div><!-- panel -->
        <br />
    </div><!-- contentpanel -->
</div><!-- mainpanel -->
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>