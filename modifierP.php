<?php
  //fichier la modification des produits
 require_once '../model/connectBd.php';

            

        if (isset($_REQUEST['id_update'])) { //recuper au niveau de fichier creation opération bouton modifier pdrt
            try {

                $idprdt = $_REQUEST['id_update'];
                $select = $conn->prepare('SELECT * FROM Produit WHERE idprdt = :idprdt');
                $select->bindParam('idprdt', $idprdt);
                $select->execute();
                $response = $select->fetch(PDO::FETCH_ASSOC);
                extract($response);
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                
            }
        }
