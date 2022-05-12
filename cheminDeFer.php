<?php
/* 
génération du fichier excel. On sn e connecte à la base, récupère les infos des tables produits et catalogues, on cré un fichier excel vide, parcours les données récupérées et rempli le excel vide
*/
	include '../controller/phpspreadsheet/vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	require_once '../model/connectBd.php';
	$req = $conn->prepare('SELECT * FROM Produit 
                        INNER JOIN catalogue
                        ON catalogue.idCatalogue = Produit.idCatalogue');
	$req->execute();
	$data = $req->fetchAll();

	$file = new Spreadsheet();
	$activeSheet = $file->getActiveSheet();

	$activeSheet->setCellValue('A1', 'ID_OPERATION');
	$activeSheet->setCellValue('B1', 'ID_PDT');
	$activeSheet->setCellValue('C1', 'NUM_PAGE');
	$activeSheet->setCellValue('D1', 'TITRE_PDT');
	$activeSheet->setCellValue('E1', 'DESCRIPTIF_PDT');
	$activeSheet->setCellValue('F1', 'DIMENSION');
	$activeSheet->setCellValue('G1', 'PRIX');
	$activeSheet->setCellValue('H1', 'PRIX_BARRE');
	$activeSheet->setCellValue('I1', 'VISUEL');
	$activeSheet->setCellValue('J1', 'PICTO_1');
	$activeSheet->setCellValue('K1', 'PICTO_2');
	$activeSheet->setCellValue('L1', 'PICTO_3');
	$activeSheet->setCellValue('M1', 'PICTO_4');
	$activeSheet->setCellValue('N1', 'PICTO_5');
	$count = 2;

	foreach ($data as $row) {
		$activeSheet->setCellValue('A' . $count , $row['moisParution'] . '_' . $row['anneeParution']);
		$activeSheet->setCellValue('B' . $count, $row['idprdt']);
		$activeSheet->setCellValue('C' . $count, $row['nomPage']);
		$activeSheet->setCellValue('D' . $count , $row['nom']);
		$activeSheet->setCellValue('E' . $count, $row['description']);
		$activeSheet->setCellValue('F' . $count, $row['dimension']);
		$activeSheet->setCellValue('G' . $count , $row['prix']);
		$activeSheet->setCellValue('H' . $count, $row['prixBarre']);
		$activeSheet->setCellValue('I' . $count, $row['visuel']);
		$activeSheet->setCellValue('J' . $count , $row['garanti']);
		$activeSheet->setCellValue('K' . $count, $row['fabrication']);
		$activeSheet->setCellValue('L' . $count, $row['produit1']);
		$activeSheet->setCellValue('M' . $count, $row['produit2']);
		$activeSheet->setCellValue('N' . $count , $row['produit3']);

		$count  = $count + 1;
	}

	$writer = new Xlsx($file);
	$writer->save('chemin_de_fer.xlsx');
	
?>