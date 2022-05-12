<?php 
//Email programmé qui s'envoi automatiquement apres que l'utilisateur ait apporté des modifications aux produits avec en pièce jointe le chemin de fer, et le fichier récapitulatif des mouvements

$destinataire = 'latifa.akpo01@gmail.com';
 

$objet = 'Chemin de fer et récap';
 
// clé aléatoire de limite
$boundary = md5(uniqid(microtime(), TRUE));
 
// Headers
$headers = 'From: Tifa Mama <tifamama78@gmail.com>'."\r\n";
$headers .= 'Mime-Version: 1.0'."\r\n";
$headers .= 'Content-Type: multipart/mixed;boundary='.$boundary."\r\n";
$headers .= "\r\n";
 
// Message
$msg = 'Texte affiché par des clients mail ne supportant pas le type MIME.'."\r\n\r\n";
 
// Message HTML
$msg .= '--'.$boundary."\r\n";
$msg .= 'Content-type: text/html; charset=utf-8'."\r\n\r\n";
$msg .= 'Veuillez trouver ci-joint le chemin de fer et le récap après la modification des produits du catalogue'."\r\n";
 
// Pièce jointe 1
$file_name = 'Recap.xlsx';
if (file_exists($file_name))
{
	$file_type = filetype($file_name);
	$file_size = filesize($file_name);
 
	$handle = fopen($file_name, 'r') or die('File '.$file_name.'can t be open');
	$content = fread($handle, $file_size);
	$content = chunk_split(base64_encode($content));
	$f = fclose($handle);
 
	$msg .= '--'.$boundary."\r\n";
	$msg .= 'Content-type:'.$file_type.';name='.$file_name."\r\n";
	$msg .= 'Content-transfer-encoding:base64'."\r\n\r\n";
	$msg .= $content."\r\n";
}
 
// Pièce jointe 2
$file_name = 'chemin_de_fer.xlsx';
if (file_exists($file_name))
{
	$file_type = filetype($file_name);
	$file_size = filesize($file_name);
 
	$handle = fopen($file_name, 'r') or die('File '.$file_name.'can t be open');
	$content = fread($handle, $file_size);
	$content = chunk_split(base64_encode($content));
	$f = fclose($handle);
 
	$msg .= '--'.$boundary."\r\n";
	$msg .= 'Content-type:'.$file_type.';name='.$file_name."\r\n";
	$msg .= 'Content-transfer-encoding:base64'."\r\n\r\n";
	$msg .= $content."\r\n";
}
 
// Fin
$msg .= '--'.$boundary."\r\n";
 
// Function mail()
mail($destinataire, $objet, $msg, $headers)
 	

?>