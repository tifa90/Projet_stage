<?php
//Fichier de modification de la liste des opérations

 require_once '../model/connectBd.php';

        if (isset($_REQUEST['id_update'])) {
            try {

                $idCatalogue = $_REQUEST['id_update'];
                $select = $conn->prepare('SELECT * FROM catalogue WHERE idCatalogue = :idCatalogue');
                $select->bindParam('idCatalogue', $idCatalogue);
                $select->execute();
                $response = $select->fetch(PDO::FETCH_ASSOC);
                extract($response);
                
            } catch (PDOException $e) {

                echo $e->getMessage();
            }
        }

        if (isset($_REQUEST['btn_update'])) {
            $numero = $_REQUEST['numero'];
            $nom = $_REQUEST['nom'];
            $moisParution = $_REQUEST['moisParution'];
            $anneeParution = $_REQUEST['anneeParution'];

            if (empty($numero) && empty($nom) && empty($moisParution) && empty($anneeParution)) {
                 $errorMsg="Rentrez une valeur";
            }
            else{

                try {

                    if (!isset($errorMsg)) {
                        $update=$conn->prepare('UPDATE catalogue SET numero=:numero, nom=:nom, moisParution=:moisParution,anneeParution=:anneeParution, dateModif=now() WHERE idCatalogue = :idCatalogue LIMIT 1 ');

                        $update->bindParam(':numero',$numero);
                        $update->bindParam(':nom',$nom);
                        $update->bindParam(':moisParution',$moisParution);
                        $update->bindParam(':anneeParution',$anneeParution);
                        $update->bindParam(':idCatalogue',$idCatalogue);


                        if (null!==$update->execute()) {

                          
                            
                            $updateMsg="L'ajout a été fait avec success.........";
                            header("refresh:1;accueil.php");
                        }

                    }
                    
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

            }    
        }
?>  