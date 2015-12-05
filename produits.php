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
                    <li><a href="#">Produits</a></li>
                </ul>
                <h4>Table des produits</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
    
    <div class="contentpanel">
        <div class="panel panel-primary-head">       
            <div class="mb30">
                <?php if ($_SESSION['success'] == 1): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong><?php echo $_SESSION['message'];  $_SESSION['message']="";$_SESSION['success']=""; ?></strong>
                    </div>
                <?php elseif ($_SESSION['success'] == 2): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong><?php echo $_SESSION['message']; $_SESSION['message']="";$_SESSION['success']=""; ?></strong>
                    </div>
                <?php endif ?>
                

                
            </div>

            <table id="basicTable" class="table table-striped table-bordered responsive">
                <thead class="">
                    <tr>
                        <th>Référence</th>
                        <th>Nom du produit</th>
                        <th>Quantite</th>
                        <th>Quantite minimal</th>
                        <th>Prix</th>
                        <th>Modification</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $produits= getAllProducts();
                      foreach($produits as $produit){ ?> 
                            <tr>
                              <td><?php echo $produit['ref']; ?> </td>
                              <td><?php echo $produit['nom']; ?> </td>
                              <td><?php echo $produit['qte']; ?> </td>
                              <td><?php echo $produit['qte_min']; ?> </td>
                              <td><?php echo $produit['prix']; ?> </td>
                              <td class="center"><a class="btn btn-primary" href="modifier_produit.php?ref=<?php echo $produit['ref']; ?>"><i class="fa fa-edit"></i></a></td>
                              <td class="center"><a class="btn btn-primary" href="php_supprimer_produit.php?ref=<?php echo $produit['ref']; ?>"><i class="fa fa-trash-o"></i></a></td>
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