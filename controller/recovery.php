<?php

//Fichier pour la récupération du token, le code généré lors du signalement de l'oublie du mot de passe.
//ce token est unique et permet d'identifier l'utilisateur dans la table User afin de l'identifier pour le update plus tard dans la base au fichier suivant: modifMdp.php
	
 require_once '../model/connectBd.php';
	if (isset($_GET['u']) && isset($_GET['token']) && !empty($_GET['u']) && !empty($_GET['token'])) {
		$u = htmlspecialchars(base64_decode($_GET['u']));
		$token = htmlspecialchars(base64_decode($_GET['token']));
		$check = $conn->prepare('SELECT * FROM RecuperationM2p WHERE token_usr = ? AND token = ?');
		$check->execute(array($u,$token));
		$row = $check->rowCount();
		if ($row) {
			$get = $conn->prepare('SELECT token FROM User WHERE token = ?');
			$get->execute(array($u));
			$data_u = $get->fetch();

			if (hash_equals($data_u['token'], $u)) {
				header('Location: ../controller/modifMdp.php?u=' .base64_encode($u));
			}else{
            echo 'Erreur de compte';   
    } 

		}else{
            echo 'Compte non valide';   
    } 

	}else{
            echo 'Lien non valide';   
    } 
?>

