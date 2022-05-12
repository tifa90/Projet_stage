<?php

/*Traitement du formulaire de connexion
on vérifie si les données sont renseignées, on se connecte à la base et on récupére l'email et mot de passe renseigné 
se trouvant dans la table User. Si tout est bon on est redirigé vers la page d'accueil sinon, il y a un problème
*/
require_once '../model/connectBd.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

        	
    $stmt = $conn->prepare('SELECT * FROM User WHERE email = ? AND motdepasse = ? ');
    $email = htmlspecialchars($_POST['email']) ;
	$pwd = htmlspecialchars($_POST['password']) ;
	$stmt->execute(array( $email, $pwd));
	if ($stmt->rowCount() == 1) {
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $pwd ;
		$authOk = true;

		header('Location: accueil.php');
				
	}else{
		echo 'Mot de passe ou email incorrect';
	}	
			

    }
?>