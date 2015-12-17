<?php
if (empty($_SESSION['id'])) {
    header("Location:signin.php");
}?>

<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Auto3bservices</title>

        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />
        <link href="css/style.datatables.css" rel="stylesheet">
        <link href="cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="#" class="logo">
                        <img src="images/logo.gif" alt="" style="width: 160px;height: 81px;margin-bottom: -16px;margin-top: -20px;">
                    </a>
                    <div class="pull-right">
                        <a href="#" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                    <div class="pull-right">
                            
                        

                       <!-- <div class="btn-group btn-group-list btn-group-notification">
                            <a href="#" type="button" class="btn btn-default dropdown-toggle orange" data-toggle="dropdown">
                              <i class="fa fa-bullhorn"></i>
                              <span class="badge">13</span>
                                
                                
                            </a>      
                        </div> btn-group -->
                            <div class="btn-group btn-group-list btn-group-notification">
                                
                        <?php if(getNotifProducts() == 0) {?>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php } else { ?>
                                <button type="button" class="btn btn-default dropdown-toggle orange" data-toggle="dropdown">
                        <?php } ?>
                              <i class="fa fa-bell-o"></i>
                              <span class="badge">
                                <?php echo getNotifProducts(); ?>
                              </span>
                            </button>
                            <div class="dropdown-menu pull-right">
                                <h5>Notification</h5>
                                <ul class="media-list dropdown-list">
                                <?php 
                                  $produits= getAllProductsNotif();
                                  foreach($produits as $produit) { ?> 
                                    <li class="media">
                                        <div class="media-body">
                                          Le produit <strong><?php echo $produit['nom'] ?></strong> a atteint la quantité minimum
                                          <small class="date"><i class="fa fa-forward"></i>Référence du produit: <?php echo $produit['ref'] ?> </small>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                                <div class="dropdown-footer text-center">
                                    <a href="notif_produits.php" class="link" style="color:#1C65A5;">Voir toutes les notifications</a>
                                </div>
                            </div><!-- dropdown-menu -->
                        </div>
                                                
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Déconnexion</a></li>
                            </ul>
                        </div><!-- btn-group -->
                        
                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        <br>
        <br>
        <section>
            <div class="mainwrapper">
                <div class="leftpanel"> 
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">                        
                        <li class="parent <?php if ($_SERVER['REQUEST_URI'] == '/auto3bservices/produits.php' || $_SERVER['REQUEST_URI']  == '/auto3bservices/ajouter_produit.php' ) { echo 'active';} ?>"><a href="produits.php"><i class="fa fa-car"></i> <span>Produits</span></a>
                            <ul class="children">
                                <?php 
                                       ; 
                                 ?>
                                <li class="<?php if ($_SERVER['REQUEST_URI'] == '/auto3bservices/produits.php') { echo 'active';} ?>"><a href="produits.php">Liste des produits</a></li>
                                <li class="<?php if ($_SERVER['REQUEST_URI'] == '/auto3bservices/ajouter_produit.php') { echo 'active';} ?>"><a href="ajouter_produit.php">Ajouter produit</a></li>
                            </ul>
                        </li>
                        <li class="parent <?php if ($_SERVER['REQUEST_URI'] == '/auto3bservices/factures.php') { echo 'active';} ?>"><a href="factures.php"><i class="fa fa-file-text"></i> <span>Factures</span></a>
                            <ul class="children">
                                <?php 
                                       ; 
                                 ?>
                                <li class="<?php if ($_SERVER['REQUEST_URI'] == '/auto3bservices/factures.php') { echo 'active';} ?>"><a href="factures.php">Liste des factures</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </div><!-- leftpanel -->