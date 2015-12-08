<?php session_start();
if (!empty($_SESSION['id'])) {
    header("Location:produits");
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

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="images/logo.gif" style="margin-top: -45px;" alt="Chain Logo" >
                    </div>
                    <br />
                    <div class="mb30"  id="erreur">
                        
                    </div>
                    
                    <form>
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Identifiant">
                        </div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                        </div><!-- input-group -->
                        
                        <div class="clearfix">
                            <div class="pull-right">
                                <button type="button" class="btn btn-success" id="login" style="background-color: #f0ad4e;">Connexion <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>
                    
                </div>
            </div><!-- panel -->
            
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>

        <script src="js/custom.js"></script>
        <script src="js/scripts.js"></script>

    </body>
</html>
