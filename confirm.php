<?php

//Fichier pour la confirmation de la modification
 require_once '../model/connectBd.php';
   
        if (isset($_REQUEST['id_confirm'])) { // On vérifie si l'id du produit existe pour la confirmation id_confirm = idprdt
          try {

            $idprdt = $_REQUEST['id_confirm'];
            $select = $conn->prepare('SELECT * FROM Produit  WHERE idprdt = :idprdt');
            $select->bindParam('idprdt', $idprdt);
            $select->execute();
            $response = $select->fetch(PDO::FETCH_ASSOC);
            extract($response);
            
          } catch (PDOException $e) {

            echo $e->getMessage();
            
          }
        }

        //récupération avec mise à jour des données

        if (isset($_REQUEST['btn_confirm'])) {//on vérifie si le bouton a été cliqué
          //on récupére le fichier et l'insére dans le dossier image
          $img = $_FILES['fichier'];
          $ext = strtolower(substr($img['name'], -4)) ;
          $chemin = '/Applications/MAMP/htdocs/images/'.$img['name'];
          $extension_autorise = array("jpeg", "png", "jpg","gif");
          if (in_array($ext, $extension_autorise)) {
            move_uploaded_file($img['tmp_name'], "/Applications/MAMP/htdocs/images/".$img['name']);
          }else {
              $errorImg = "Votre fichier n'est pas une image !";
          }

          $nom = $_REQUEST['nom'];
          $description = $_REQUEST['description'];
          $prix = $_REQUEST['prix'];
          $prixbarre = $_REQUEST['prixBarre'];
          $dimension = $_REQUEST['dimension'];
          $visuel = $_FILES['fichier']['name'];
          $garanti = $_REQUEST['garanti'];
          $fabrication = $_REQUEST['fabrication'];
          $produit1 = $_REQUEST['produit1'];
          $produit2 = $_REQUEST['produit2'];
          $produit3 = $_REQUEST['produit3'];
         

          if (empty($nom) && empty($description) && empty($prix) && empty($prixbarre) && empty($dimension) && empty($visuel) && empty($garanti) && empty($fabrication) && empty($produit1) && empty($produit2) && empty($produit3)) {
            $errorMsg="Rentrez une valeur dans les champs !";
          }else {
              try {

                if (!isset($errorMsg)) {
                  $update=$conn->prepare('UPDATE Produit SET nom=:nom, description=:description, prix=:prix, prixBarre=:prixBarre, dimension=:dimension, visuel=:visuel, garanti=:garanti, fabrication=:fabrication, produit1=:produit1, produit2=:produit2, produit3=:produit3, dateModif=now() WHERE idprdt = :idprdt LIMIT 1');
                  $update->bindParam(':nom',$nom);
                  $update->bindParam(':description',$description);
                  $update->bindParam(':prix',$prix);
                  $update->bindParam(':prixBarre',$prixBarre);
                  $update->bindParam(':dimension',$dimension);
                  $update->bindParam(':visuel',  $visuel); 
                  $update->bindParam(':garanti',$garanti);
                  $update->bindParam(':fabrication',$fabrication);
                  $update->bindParam(':produit1',$produit1);
                  $update->bindParam(':produit2',$produit2);
                  $update->bindParam(':produit3',$produit3);
                  $update->bindParam(':idprdt',$idprdt);

                  if (null!==$update->execute()) {
                    $updateMsg="L'ajout a été fait avec success.........";

                    header("refresh:1;creationOP.php"); 
                  }

                }
                
              } catch (PDOExceptionn $e) {
                
              }


          }
          
          
        }
?>
