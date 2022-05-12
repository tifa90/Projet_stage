<?php 
require_once '../controller/modifierOp.php';

?>
<!-- Formulaire de modification de la liste des opérations -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap part -->
   
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Icone part -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!--CSS part-->
  <link rel="stylesheet" type="text/css" href="../css/style.css">

        <!-- Font part -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- jquery pour récupérer le nom de fichier telecharger dans le input a mettre peut-être dans le body sii ne fonctionne pas--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>

  <title>Modification de la liste des opérations</title>

  <script type="text/javascript">
      
    (function () {
      'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

  </script>

</head>
<body>

   <!--header avec la bannière-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
          <div class="mr-auto">
              <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
          </div>
      </div>
          
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="connexion.php">
                    <i class="fa fa-sign-out"></i> Déconnexion 

                  </a>
              </li>
          </ul>
      </div>
    </nav>

      <div class="container-fluid">
        <div class="row">
<!--colonne pour le menu vertical-->
          <div class="col col-md-auto menu">

              <nav class="nav flex-column bg-light">
                <a class="nav-link active tableau" href="accueil.php">Tableau de bord</a>
              </nav>
      
          </div>

          <!-- Formulaire de création de produits-->
          <div class="col">

            <div class="d-block offset-1 p-1 mt-4 position-relative form2">

              <h6 class="display 2 text-center">Modification de la liste des opérations</h6>
              <h6>Modification du catalogue : <?php echo $response['nom']?> </h6>

              
                
            </div>

            <div class="d-block offset-1 p-1 mt-4 position-relative form">
              <h3 class="titre p-1 mt-2">Modifier un catalogue</h3>


              <?php

                if (isset($errorMsg)) {
                ?>
                    <div class="alert alert-danger">
                        <strong>WRONG! <?php echo "$errorMsg"; ?></strong>
                        
                    </div>
                <?php    
                }

                if (isset($updateMsg)) {
                ?>

                    <div class="alert alert-success">
                        <strong><?php echo "$updateMsg"; ?></strong>
                        
                    </div>
                <?php 
                }
                ?>
              

          
           <form action=" " method="post" role ="form" class="form-horizontal" data-toggle="validator" novalidate="true">

                  <div class="d-block offset-2 p-2 mt-5 bg-white contenu">
              <!-- formulaire 1-->
                    <div class="form-row">
                      <div class="form-group col-md-6">

                          <label for="titre">Numéro</label>
                          <input type="text" class="form-control" id="num" name="numero" value="<?php echo $numero ?>" data-error=" Rentrez un numero de catalogue" required>
                          
                      </div>
                        <div class="form-group col-md-6">
                          <label for="description">Nom</label>
                          <input type="text" class="form-control" id="name" name="nom" value="<?php echo $nom ?>" data-error="Rentrez un nom de catalogue" required>
                         
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="prix">Mois de parution</label>
                          <input type="text" class="form-control" id="mois" name="moisParution" value="<?php echo $moisParution ?>" data-error="Rentrez un mois de parution" required>
                          <input type="hidden" name="idCatalogue" value="<?php echo $cata['idCatalogue'] ?>"/> 
                      </div>
                 
                      <div class="form-group col-md-6">
                        <label for="dimension">Année de parution</label>
                          <input type="text" class="form-control" id="annee" name="anneeParution" value="<?php echo $anneeParution ?>" data-error="Rentrez une année de parution" required>
                          <input type="hidden" name="datemodif" value="<?php echo $dateModif ?>"/> 
                      </div>
                    </div>

                  </div>

                  <div class="form-group position-relative mb-0">
                    <div class="btn-holder">
                        <button type="submit" name= "btn_update" class="btn btn-info d-block offset-5 p-2 mt-5">Modifier</button>
                    </div>
                </div>

               

<!-- bouton sommettre -->
                
              
              </form>   
            </div>
          </div>
        </div>
      </div>

      
      

</body>
</html>