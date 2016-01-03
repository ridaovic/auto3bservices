$(document).ready(function() {
    
    // Authentification script
    $('#login').on('click', function(e) {      
        // // Je récupère les valeurs
        var username = $('#username').val();
        var password = $('#password').val();
        
        if (username!="" && password!="") {
            $.post( "php_signin.php", { username: username, password: password }, function( data ) {

            if (data.success==1) {
                window.location.href = "index.php";
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

                //vider les champs apres submission
                $('#num_fact').val("");
                $('#date_fact').val("");
                $('#nom').val("");
                $('#prenom').val("");
                $('#immatriculation').val("");
                $('#marque_voiture').val("");
                $('#designation').val("");
                $('#qte').val("");
                $('#etat_facture').val("");
                $('#prix').val("");
                $('#montant').val("");
                $('#total').val("");



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
        var code = $('#code').val();
        
        if (ref!="" && nom!="" && qte!="" && qte_min!="" && prix!="") {

            $.post( "php_ajouter_produit.php", { ref : ref, nom : nom , qte : qte , qte_min : qte_min , prix : prix , code : code}, function( data ) {

            if (data.success==1) {
                
                $('#ref').val("");
                $('#nom').val("");
                $('#qte').val("");
                $('#qte_min').val("");
                $('#prix').val("");
                $('#code').val("");

                $('#erreur').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            } else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            };
            
          },"json");    

        }else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Tous les champs sont obligatoires</strong></div>")      
        }

        $('.bs-example-modal').modal('hide')
    });
    


    // ajouter vehicule
    $('#add_vehicule').on('click', function(e) {   
        // // Je récupère les valeurs
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var  mat= $('#mat').val();
        var marque = $('#marque').val();
        var ass = $('#ass').val();
        var exp = $('#exp').val();
        var chassis = $('#chassis').val();
        var grise = $('#grise').val();
        var de = $('#de').val();
        var ds = $('#ds').val();
       
        if (nom!="" && prenom!="" && mat!="" && marque!="" && ass!="" && exp!="") {

            $.post( "php_ajouter_vehicule.php", { nom : nom, prenom : prenom , mat : mat , marque : marque , chassis : chassis , grise : grise , ass : ass, exp : exp, de : de, ds : ds}, function( data ) {

            if (data.success==1) {
                
                $('#nom').val("");
                $('#prenom').val("");
                $('#mat').val("");
                $('#marque').val("");
                $('#chassis').val("");
                $('#grise').val("");
                $('#ass').val("");
                $('#exp').val("");
                $('#de').val("");
                $('#ds').val("");

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
        var code = $('#code').val();

        
        if (ref!="" && nom!="" && qte!="" && qte_min!="" && prix!="") {

            $.post( "php_modifier_produit.php", { ref : ref, nom : nom , qte : qte , qte_min : qte_min , prix : prix, code : code}, function( data ) {

            if (data.success==1) {
                $('#erreur').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            } else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>"+data.message+"</strong></div>")
            };
            
          },"json");    

        }else{
                $('#erreur').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Tous les champs sont obligatoires</strong></div>")      
        }

        $('.bs-example-modal').modal('hide')
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


$('#add_col').on('click', function(e) {
    var val=$(".col").length;
    var col='<div class="row col"><div class="col-sm-6"><div class="form-group"><label class="control-label">Designation</label><input type="text" name="designation[]" class="form-control" /></div><!-- form-group --></div><!-- col-sm-3 --><div class="col-sm-2"><div class="form-group"><label class="control-label">Quantité</label><input type="number" name="qte[]" class="form-control" value=""/></div><!-- form-group --></div><!-- col-sm-2 --><div class="col-sm-2"><div class="form-group"><label class="control-label">Prix  U.T HT</label><input type="number" name="prix[]" id="prix" class="form-control" onkeyup="myFunction()" value=""/></div><!-- form-group --></div><!-- col-sm-2 --><div class="col-sm-2"><div class="form-group"><br><br><div class="checkbox block"><label><input name="occ[]" value="'+val+'" type="checkbox"> Occasion</label></div></div></div><!-- row -->';
    $('.col').last().after(col);

}); 

$('#add_col2').on('click', function(e) {
    var col='<div class="row col"><div class="col-sm-8"><div class="form-group"><label class="control-label">Designation</label><input type="text" name="designation[]" class="form-control" /></div><!-- form-group --></div><!-- col-sm-3 --><div class="col-sm-2"><div class="form-group"><label class="control-label">Quantité</label><input type="number" name="qte[]" class="form-control" value=""/></div><!-- form-group --></div><!-- col-sm-2 --><div class="col-sm-2"><div class="form-group"><label class="control-label">Prix  U.T HT</label><input type="number" name="prix[]" class="prix form-control" value=""/></div><!-- form-group --></div><!-- col-sm-2 --></div><!-- row -->';
    $('.col').last().after(col);

});

function displayResult(item, val, text) {
    console.log(item);
    console.log(val);
    console.log(item);
    //$('.alert').show().html('You selected <strong>' + val + '</strong>: <strong>' + text + '</strong>');
}


$('#demo1').typeahead({
    source: function (query, process) {
            $.ajax({
              url: 'facture_devis.php',
              type: 'POST',
              dataType: 'JSON',
              data: 'query=' + query,
              success: function(data) {
                //console.log(data);
                process(data);
              }
            });
          },
    updater: function(selection){
        
        $.post( "tab_factures.php", { id : selection['id'] }, function( data ) {
            $('#facture').html(data);
        },"html");

        $.post( "tab_devis.php", { id : selection['id'] }, function( data ) {
            $('#devis').html(data);
        },"html");
    }
});


$('.delete').on('click', function(e) {
    $('#identifiant').val(this.id);
});

$('.valid').on('click', function(e) {
    $('#id1').val(this.id);
});

$('.invalid').on('click', function(e) {
    $('#id2').val(this.id);
});

$('.pdf').on('click', function(e) {
    $('#id3').val(this.id);
});


$('#confirm_facture,#confirm_devis').on('click', function(e) {
    $( "#target" ).submit();
});

});