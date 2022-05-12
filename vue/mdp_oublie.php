<!--Formulaire de mot de passe oublié-->

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
    	<title>Mot de passe oublié!</title>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-4 offset-4">
					<div class="d-block bg-light position-relative p-5 mt-5">
						<h1>Mot de passe oublié</h1>
						<h5>Saisissez votre adresse e-mail.</h5>
						
						<form class="form-reset" action="../controller/forgot.php" method="post">
							<div class="form-group">
      							<label for="email">Adresse email</label>
      								<input type="email" name="email" class="form-control" id="emailreset"  placeholder="Saisir votre email">		
    						</div>

    						<div class="form-group position-relative mb-0">
        						<div class="btn-holder">
            						<button type="submit" name="soumettre" class="btn  btn-info d-block p-1 mt-1 mx-auto">Réinitialiser le mot de passe</button>
        						</div>
    						</div>
							
						</form>
						
					</div>
					
				</div>
				
			</div>
			
		</div>

	</body>
</html>