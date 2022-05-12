<?php
//Fichier pour la mise à jour du mot de passe en base après la modification de ce dernier. traitement du formulaire de la nouvelle saisi du mot de passe. Le token est un chiffre généré aléatoirement et unique pour chaque utilisateurs et se génère lors de la notification de demande de changement de mot de passe une fois que l'utilisateur clique sur mot de passe oublié. 
	
 require_once '../model/connectBd.php';
	if (isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['token'])) {
		if (!empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['token'])) {
			$password = htmlspecialchars($_POST['password']);
			$password2 = htmlspecialchars($_POST['password2']);
			$token = htmlspecialchars($_POST['token']);

			$check = $conn->prepare('SELECT * FROM User WHERE token = ?');
			$check->execute(array($token));
			$row = $check->rowCount();

			if ($row) {
				if ($password==$password2) {
					$cost = ['cost' =>  12];
					$password = password_hash($password, PASSWORD_BCRYPT, $cost);

					$update = $conn->prepare('UPDATE User SET motdepasse = ? WHERE token = ?');
					$update->execute(array($password,$token));

					$delete = $conn->prepare('DELETE FROM RecuperationM2p WHERE token_usr = ?');
					$delete->execute(array($token));

					echo 'Le mot de passe a été bien modifié';
					header('Location:../vue/connexion.php');
				}else{
            echo 'Mot de passe non identique';   
    } 
			}else{
            echo 'Compte non existant';   
    } 
		}else{
            echo 'Merci de renseigner un mot de passe';   
    } 
		
	}
?>