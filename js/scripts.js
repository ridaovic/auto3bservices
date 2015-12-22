$(document).ready(function() {
    
    // Authentification script
    $('#login').on('click', function(e) {      
        // // Je récupère les valeurs
        var username = $('#username').val();
        var password = $('#password').val();
        
        if (username!="" && password!="") {
            $.post( "php_signin.php", { username: username, password: password }, function( data ) {

            if (data.success==1) {
                window.location.href = "produits.php";
            } else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            };
            
          },"json");    

        }else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Tous les champs sont obligatoires</strong></div>")      
        }
    });

    //add_facture

    $('#add_facture').on('click', function(e) {   
        // // Je récupère les valeurs
        var num_fact = $('#num_fact').val();
        var date_fact = $('#date_fact').val();
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var immatriculation = $('#immatriculation').val();

        var marque_voiture = $('#marque_voiture').val();
        var designation = $('#designation').val();
        var qte = $('#qte').val();
        var etat_facture = $('#etat_facture').val();
        var prix = $('#prix').val();

        var montant = $('#montant').val();
        var total = $('#total').val();
        
        
        if (num_fact!="" && date_fact!="" && nom!="" && prenom!="" && immatriculation!=""
            && marque_voiture!="" && designation!="" && qte!="" && etat_facture!="" && prix!=""
            && montant!="" && total!="" ) {

            $.post( "php_ajouter_facture.php", { num_fact : num_fact, date_fact : date_fact , nom : nom , prenom : prenom , immatriculation : immatriculation, marque_voiture : marque_voiture, designation : designation , qte : qte , etat_facture : etat_facture , prix : prix , montant : montant , total : total }, function( data ) {

            if (data.success==1) {
                
                var num_fact = $('#num_fact').val();
                var date_fact = $('#date_fact').val();
                var nom = $('#nom').val();
                var prenom = $('#prenom').val();
                var immatriculation = $('#immatriculation').val();

                var marque_voiture = $('#marque_voiture').val();
                var designation = $('#designation').val();
                var qte = $('#qte').val();
                var etat_facture = $('#etat_facture').val();
                var prix = $('#prix').val();

                var montant = $('#montant').val();
                var total = $('#total').val();

                $('#erreur').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            } else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            };
            
          },"json");    

        }else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Tous les champs sont obligatoires</strong></div>")      
        }
    });
    // ajouter produit
    $('#add_produit').on('click', function(e) {   
        // // Je récupère les valeurs
        var ref = $('#ref').val();
        var nom = $('#nom').val();
        var qte = $('#qte').val();
        var qte_min = $('#qte_min').val();
        var prix = $('#prix').val();
        
        if (ref!="" && nom!="" && qte!="" && qte_min!="" && prix!="") {

            $.post( "php_ajouter_produit.php", { ref : ref, nom : nom , qte : qte , qte_min : qte_min , prix : prix}, function( data ) {

            if (data.success==1) {
                
                var ref = $('#ref').val("");
                var nom = $('#nom').val("");
                var qte = $('#qte').val("");
                var qte_min = $('#qte_min').val("");
                var prix = $('#prix').val("");

                $('#erreur').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            } else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            };
            
          },"json");    

        }else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Tous les champs sont obligatoires</strong></div>")      
        }
    });
    


    // modifier produit
    $('#edit_produit').on('click', function(e) {
        // // Je récupère les valeurs
        var ref = $('#ref').val();
        var nom = $('#nom').val();
        var qte = $('#qte').val();
        var qte_min = $('#qte_min').val();
        var prix = $('#prix').val();
        
        if (ref!="" && nom!="" && qte!="" && qte_min!="" && prix!="") {

            $.post( "php_modifier_produit.php", { ref : ref, nom : nom , qte : qte , qte_min : qte_min , prix : prix}, function( data ) {

            if (data.success==1) {
                $('#erreur').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            } else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            };
            
          },"json");    

        }else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Tous les champs sont obligatoires</strong></div>")      
        }
    });    

$('#edit_facture').on('click', function(e) {
        // // Je récupère les valeurs
        var num_fact = $('#num_fact').val();
        var date_fact = $('#date_fact').val();
        var nom = $('#nom').val();

        var prenom = $('#prenom').val();
        var immatriculation = $('#immatriculation').val();
        var marque_voiture = $('#marque_voiture').val();
        var designation = $('#designation').val();

        var qte = $('#qte').val();
        var etat_facture = $('#etat_facture').val();
        var prix = $('#prix').val();

        var montant = $('#montant').val();
        var total = $('#total').val();
        
        if (date_fact!="" && nom!="" && 
            prenom!="" && immatriculation!="" && 
            marque_voiture!="" && designation!="" && 
            qte!="" && etat_facture!="" && 
            prix!="" && montant!="" && total!="" 
            ) {

            $.post( "php_modifier_facture.php", { num_fact : num_fact, date_fact : date_fact, nom : nom , prenom : prenom , immatriculation : immatriculation , marque_voiture : marque_voiture , designation : designation , qte : qte , etat_facture : etat_facture , prix : prix , montant : montant, total : total}, function( data ) {

            if (data.success==1) {
                $('#erreur').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            } else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            };
            
          },"json");    

        }else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Tous les champs sont obligatoires</strong></div>")      
        }
    });    

});