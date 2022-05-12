<?php

//fichier pour l'envoi du mail contenant le lien de redirection pour définir le nouveau mot de passe
	require_once '../model/connectBd.php';

	if (isset($_POST['email']) && !empty($_POST['email'])) {
		$email = htmlspecialchars($_POST['email']);
		$check = $conn->prepare('SELECT token FROM User WHERE email = ?');
		$check->execute(array($email));
		$data = $check->fetch();
		$row = $check->rowCount();

		if ($row) {
			$token = bin2hex(openssl_random_pseudo_bytes(24));
			$token_usr = $data['token'];
		
			$insert = $conn->prepare('INSERT INTO RecuperationM2p(token_usr,token) VALUES (?,?)');
			$insert->execute(array($token_usr,$token));
			$link = 'recovery.php?u=' .base64_encode($token_usr).'&token=' .base64_encode($token);

			//Envoi du lien par email pour modification du mot de passe de l'utilisateur

			$destinataire = $email; //recuperer saisi pour la modification
			$expediteur = 'tifamama78@gmail.com';//email de l'expéditeur recupérer au php.ini
			$objet = 'Réinitialisation de votre email'; // Objet du message
			$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
			$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
			$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
			$headers .= 'From: "Tifa Mama"<'.$expediteur.'>'."\n"; // Expediteur
			$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire      
			$message = '<h1>Réinitialisation de votre mot de passe</h1><p>Pour réinitialiser votre mot de passe, veuillez suivre ce lien: <a href="'.$link.'">'.$link.'</a></p>';
			mail($destinataire, $objet, $message, $headers); // Envoi du message
			
			header('Location: ../vue/connexion.php');

		}else{
            echo 'Compte inexistant';} 
	}else{
            echo 'Renseignez un email';   
    } 



	
?>
