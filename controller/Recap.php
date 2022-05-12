<?php
// Fichier permettant de suivre les différents mouvements: quel utilisateur a modifié quel produit et dans quel catalogue. génération de fichier excel

include '../controller/phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    //require_once 'connectBd.php';
     require_once '../model/connectBd.php';
    $req = $conn->prepare('SELECT Produit.idprdt,Produit.nom, catalogue.idCatalogue, catalogue.moisParution, catalogue.anneeParution, User.idUser, User.nomUser FROM Produit 
                        INNER JOIN catalogue
                        ON catalogue.idCatalogue = Produit.idCatalogue
                        INNER JOIN UserCatalogue
                        ON UserCatalogue.idProduit = Produit.idprdt
                        INNER JOIN User 
                        ON UserCatalogue.idUser = User.idUser ');
    $req->execute();
    $data = $req->fetchAll();

    $file = new Spreadsheet();
    $activeSheet = $file->getActiveSheet();

    $activeSheet->setCellValue('A1', 'ID_OPERATION');
    $activeSheet->setCellValue('B1', 'MOIS_OPERATION');
    $activeSheet->setCellValue('C1', 'ANNEE_OPERATION');
    $activeSheet->setCellValue('D1', 'ID_PDPT');
    $activeSheet->setCellValue('E1', 'TITRE_PDT');
    $activeSheet->setCellValue('F1', 'ID_USER');
    $activeSheet->setCellValue('G1', 'NOM_MEMBRE');
    $count = 2;

    foreach ($data as $row) {
        $activeSheet->setCellValue('A' . $count , $row['idCatalogue']);
        $activeSheet->setCellValue('B' . $count, $row['moisParution']);
        $activeSheet->setCellValue('C' . $count, $row['anneeParution']);
        $activeSheet->setCellValue('D' . $count , $row['idprdt']);
        $activeSheet->setCellValue('E' . $count, $row['nom']);
        $activeSheet->setCellValue('F' . $count, $row['idUser']);
        $activeSheet->setCellValue('G' . $count , $row['nomUser']);

        $count  = $count + 1;
    }

    $writer = new Xlsx($file);
    $writer->save('Recap.xlsx');
   
    
?>