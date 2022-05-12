<?php
session_start();
require_once '../controller/verifCon.php';
?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- bootstrap part -->
   
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Icone part -->
   	 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		    <!--CSS part-->
		<link rel="stylesheet" type="text/css" href="../css/style.css">

		    <!-- Font part -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

		<title>Connexion</title>

	</head>
		


	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-4 offset-4">
					<div class="d-block bg-light position-relative p-5 mt-5">
						<h1>Connexion</h1>
						<form action=" " method="post"> 
							<div class="form-group">
      							<label for="email">Adresse email</label>
      								<input type="email" class="form-control" id="email"  name="email"  placeholder="Saisir votre email" required>
    						</div>

    						<div class="form-group">
    							<span class="psw"><a href="mdp_oublie.php">Mot de passe perdu?</a></span>    
      							<label for="psw">Mot de passe</label>
      								<input type="password" class="form-control" id="mdp" name="password" placeholder="Saisir votre mot de passe" required>
      							
    						</div>

    						<div class="form-check">
      							<input type="checkbox" id="check-sign" class="form-check-input" checked="checked"> 
      							<label for="check-sign">Se souvenir de moi</label>
    						</div>
    					<!--	<div class="subscribe">
      							<p>
      								Pas de compte ? <a href="inscription.php">S'inscrire</a>
      							</p>
    						</div> -->

    						<div class="form-group position-relative mb-0">
        						<div class="btn-holder">
            						<button type="submit" name="connect" class="btn btn-info d-block mx-auto p-1 mt-2 ">Se connecter</button>
        						</div>
    						</div>
							
						</form>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
	</body>
</html>
