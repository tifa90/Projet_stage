<?php
//Fichier de connexion
    require_once 'connectBd.php';

     $reponse = $conn->prepare('SELECT * FROM User WHERE idUser = ?');

    //insertion des données dans la base de donnée

         //D''abord on vérifie si les champs sont bien remplis au niveu du formulaire
        if (isset($_POST["soumettre"])) {//bouton soumettre cliqué

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']); 
            $email = htmlspecialchars($_POST['email']); 
            $motdepasse = sha1($_POST['motdepasse']);
            $confirm = sha1($_POST['password']);
            $token = bin2hex(openssl_random_pseudo_bytes(24));

            if (!empty($nom) && !empty($prenom) && !empty($email) && !empty( $motdepasse) && !empty( $confirm)) {

                if (filter_var($email,FILTER_VALIDATE_EMAIL)) {//vérification de l'email
                    if ($motdepasse==$confirm) {
                        
                    $insert =$conn->prepare("INSERT INTO User(nom,prenom,email,motdepasse,token) VALUES (?,?,?,?,?)");
                    $insert->execute(array($nom,$prenom,$email,$motdepasse,$token));
                    $erreur = "Votre compte a bien été cré!!";
                    }
                    else{$erreur =  "Les mots de passe de correspondent pas";}
                }
                else{$erreur =  "Votre adresse email n'est pas valide";}

               

            }
            else{$erreur =  "Tous les champs doivent être complétés";}
        }
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- bootstrap part -->
   
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>

  	<!-- Icone part -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!--CSS part-->
  	<link rel="stylesheet" type="text/css" href="../css/style.css">

        <!-- Font part -->
  	<link rel="preconnect" href="https://fonts.googleapis.com">
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<title>Formulaire d'inscription</title>
</head>
<body>

	 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
          <div class="mr-auto">
              <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
          </div>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

          <!-- Formulaire de création de produits-->
          <div class="col-4 offset-4">

            <div class="d-block bg-light position-relative p-5 mt-5">
              <h4>Formulaire d'inscription</h4>
              <form action=" " method="post" data-toggle="validator" novalidate="true">
               
              <!-- formulaire 1-->
                    
                	<div class="form-group">
                       <label for="nom">Nom</label>   <!-- titre -->
                       <input type="text" class="form-control" id="nom" name="nom" value="<?php if(isset($nom)){echo $nom;}?>"  placeholder="Saisir votre nom" data-error="Entrez un nom" required>
                       <div class="help-block with-errors"></div>     
                    </div>
                   

                    <div class="form-group">
                       <label for="prenom">Prénom</label>
                       <input type="text" class="form-control" id="prenom" name="prenom" value="<?php if(isset($prenom)){echo $prenom;}?>" placeholder="Saisir votre prénom" data-error="Entrez un prénom" required>
                       <div class="help-block with-errors"></div>
                    </div>
                 
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)){echo $email;}?>" placeholder="Saisir votre email" data-error="Entrez un email" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" class="form-control" id="pwd" name="motdepasse"  data-error="Entrez un mot de passe" placeholder="Saisir votre mot de passe" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="confirm">Confirmation mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Saisir à nouveau votre mot de passe"  data-error="Entrez un mot de passe" required>
                        <div class="help-block with-errors"></div> 
                    </div>

                    <div class="form-group">
                        <label for="confirm">Rôle</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Saisir le rôle"  data-error="Entrez un rôle pour le membre" required>
                        <div class="help-block with-errors"></div> 
                    </div>
                
<!-- bouton sommettre -->
                <div class="form-group position-relative mb-0">
                    <div class="btn-holder">

                        <button type="submit" name= soumettre class="btn btn-info d-block mx-auto p-1 mt-4">S'inscrire</button>
                    
                    </div>
                </div>
                 <?php 
                    if (isset($erreur)) {
                        echo $erreur;
                    }
                ?>  
              </form> 


            </div>
          </div>
        </div>
      </div>

</body>
</html>