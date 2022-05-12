<?php    
// Fichier de déconnexion
    
session_start();  
//session_destroy sert à detruire la session  
session_destroy();  
header("Location: ../vue/connexion.php");   
?> 