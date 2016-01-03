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
                <h4>Produits</h4>
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
                        <?php if(isMinqteSupQte($produit['ref'])) {?>
                            <tr class="warning_red">
                              <td class="warning_red"><?php echo $produit['ref']; ?> </td>
                              <td class="warning_red"><?php echo $produit['nom']; ?> </td>
                              <td class="warning_red"><?php echo $produit['qte']; ?> </td>
                              <td class="warning_red"><?php echo $produit['qte_min']; ?> </td>
                              <td class="warning_red"><?php echo $produit['prix']; ?> </td>
                              <td class="center warning_red"><a class="btn btn-primary blue_b btn-rounded" href="modifier_produit.php?ref=<?php echo $produit['ref']; ?>"><i class="fa fa-edit"></i></a></td>
                              <td class="center warning_red"><a class="btn btn-primary blue_b btn-rounded" href="php_supprimer_produit.php?ref=<?php echo $produit['ref']; ?>"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                              <td><?php echo $produit['ref']; ?> </td>
                              <td><?php echo $produit['nom']; ?> </td>
                              <td><?php echo $produit['qte']; ?> </td>
                              <td><?php echo $produit['qte_min']; ?> </td>
                              <td><?php echo $produit['prix']; ?> </td>
                              <td class="center"><a class="btn btn-primary blue_b btn-rounded"  href="modifier_produit.php?ref=<?php echo $produit['ref']; ?>"><i class="fa fa-edit"></i></a></td>
                              <td class="center"><a class="btn btn-danger btn-rounded delete" id="<?php echo $produit['ref']; ?>" data-toggle="modal" data-target=".bs-example-modal"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                        <?php } ?>
                              
                        <?php } ?> 
                </tbody>
            </table>
        </div><!-- panel -->
        <br />
    </div><!-- contentpanel -->
</div><!-- mainpanel -->



<section>
  <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content"><div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">Entrer le code de securite</h4>
      </div>
        <div class="modal-body">
        <form class="form-inline" method="GET" action="php_supprimer_produit.php">
        <div class="form-group">
        <div class="col-sm-8">
        <input type="text" name="code" style="width: 400px !important;" placeholder="code de securite" class="form-control">
        <input type="hidden" name="identifiant" id="identifiant" value="">
        </div>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-danger mr5">Supprimer</button>              
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php // include db connect class
require_once __DIR__ . '/footer.php'; ?>