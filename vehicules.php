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
                    <li><a href="#">Véhicules</a></li>
                </ul>
                <h4>Véhicules</h4>
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
                        <th>Nom et prenom</th>
                        <th>Immatriculation</th>
                        <th>Marque</th>
                        <th>Expére</th>
                        <th>Assurance</th>
                        <th>Date entrée</th>
                        <th>Date sortie</th>
                        <th>Generer devis</th>
                        <th>Generer facture</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $vehicules= getAllVehicules();
                      foreach($vehicules as $vehicule){ ?> 
                        <tr>
                              <td><?php echo ($vehicule['nom']." ".$vehicule['prenom']); ?> </td>
                              <td><?php echo $vehicule['immatriculation']; ?> </td>
                              <td><?php echo $vehicule['marque']; ?> </td>
                              <td><?php echo $vehicule['expere']; ?> </td>
                              <td><?php echo $vehicule['assurance']; ?> </td>
                              <td><?php echo $vehicule['date_entree']; ?> </td>
                              <td><?php echo $vehicule['date_sortie']; ?> </td>
                              <td> </td>
                              <td> </td>
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