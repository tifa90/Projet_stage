<?php
//deuxiéme formulaire de modification de mot de passe où l'utilisateur défini le nouveau mot de passe
 require_once '../model/connectBd.php';
  if (isset($_GET['u']) && !empty($_GET['u'])) { // on récupère l'id de l'utilisateur afin de verifier qu'il existe vraiment
    $token = htmlspecialchars(base64_decode($_GET['u'])); // on génére le code unique pour l'utilisateur
    $check = $conn->prepare('SELECT * FROM RecuperationM2p WHERE token_usr = ?');
    $check->execute(array($token));
    $row = $check->rowCount();
    if ($row == 0) {
      echo 'lien non valide';
      die();
    }
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
              <h4>Nouveau mot de passe!</h4>
              <form  action="../controller/modifMdp_post.php" method="post" data-toggle="validator" novalidate="true">

                    <div class="form-group">
                        <label for="psw">Réinitialiser votre mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="password" placeholder="Saisir votre mot de passe" required>
                        <input type="hidden" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u']));?>">      
                    </div>

                    <div class="form-group">
                        <label for="psw">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="password2" placeholder="Confirmer votre mot de passe" required>          
                    </div>
                   
                    
<!-- bouton sommettre -->
                <div class="form-group position-relative mb-0">
                    <div class="btn-holder">
                        <button type="submit" name= soumettre class="btn btn-info d-block mx-auto p-1 mt-4">Changer de mot de passe</button>
                    </div>
                </div>
                
                </form> 
              
            </div>
          </div>
        </div>
    </div>

</body>
</html>