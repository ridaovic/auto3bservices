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
                    <li><a href="#">Devises</a></li>
                </ul>
                <h4>Devises</h4>
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
                        <th>Calculer</th>                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $devises= getAllDevis();
                      foreach($devises as $devis){ ?> 
                        <tr>
                          <td><?php echo ($devis['nom']." ".$devis['prenom']); ?> </td>
                          <td><?php echo $devis['immatriculation']; ?> </td>
                          <td><?php echo $devis['marque']; ?> </td>
                          <td><?php echo $devis['expere']; ?> </td>
                          <td><?php echo $devis['assurance']; ?> </td>
                          <td><?php echo $devis['date_entree']; ?> </td>
                          <td><?php echo $devis['date_sortie']; ?> </td>
                          <td class="center"><a class="btn btn-primary blue_b btn-rounded" onclick="alert('la différence entre le montant de devis et le montant accordé : '+ <?php echo ($devis['ht']-$devis['hta']) ?>)"><i class="fa fa-info"></i></span></td> 
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