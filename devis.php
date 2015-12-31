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
                    <li><a href="#">Devis</a></li>
                </ul>
                <h4>Devis</h4>
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
                
                <table id="basicTable1" class="table table-striped table-bordered responsive">
                            <thead class="">
                                <tr>
                                    <th>Numero de facture</th>
                                    <th>date de la facture</th>
                                    <th>Nom et Prenom</th>
                                    <th>Immatriculation</th>
                                    <th>Marque de voiture</th>
                                    <th>Impression</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $devises= getAllDevis();
                                  foreach($devises as $devis){ 
                                    ?> 
                                        <tr>
                                          <td># <?php echo $devis['id']; ?> </td>
                                          <td><?php echo $devis['created']; ?> </td>
                                          <td><?php echo $devis['nom'].' '.$devis['prenom']; ?> </td>
                                          <td><?php echo $devis['immatriculation']; ?> </td>
                                          <td><?php echo $devis['marque']; ?> </td>
                                          <td class="center"><a class="btn btn-primary blue_b btn-rounded" href="devis2pdf.php?id=<?php echo $devis['id']; ?>"><i class="fa fa-file-pdf-o"></i></a></td> 
                                        </tr>
                                    <?php } ?> 
                            </tbody>
                        </table>
               
                
            </div>


            
            
        </div><!-- panel -->
        <br />
    </div><!-- contentpanel -->
</div><!-- mainpanel -->
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>