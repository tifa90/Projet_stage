<?php

//Fichier pour la connexion à la base de donnée.
//Si connexion à un nouveau server changer le servername le username et le password afin de rentrer les informations du server
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';

            // Creation de la base de donée
    try{

        //$conn = new PDO("mysql:host=$servername", $username, $password);//creation de la base de données
        //$sql = "CREATE DATABASE Outils_atlas";
        //$conn->exec($sql);
        //echo 'Base de données bien créée!';

        //Connexion a la base de donnee

        $conn = new PDO("mysql:host=$servername;dbname=Outils_atlas", $username, $password);// une fois la base crée, on s'y connecte et on cré nos table
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'connexion réussi';

        //Creation d'une table dans la base de donnee
        // $sql = "CREATE TABLE catalogue (
        //   idCatalogue INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        //   numero VARCHAR(20) NOT NULL ,
        //   nom VARCHAR(20) NOT NULL ,
        //   moisParution VARCHAR(10) NOT NULL)
        //   ENGINE = InnoDB ";
        // $conn->exec($sql);
        // echo 'Table bien créée!';

        //Insertion de donnee dans la base de donnees
        $sql = "INSERT INTO catalogue(numero,nom,moisParution) VALUES ('C01', 'home edition','Aout')";
        $conn->exec($sql);
        echo 'Insertion reussi';
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
?>
