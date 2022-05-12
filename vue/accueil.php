<?php
session_start();
require_once '../model/connectBd.php';


$reponse = $conn->query(' SELECT * FROM catalogue ');
$nbligne = $conn->query('SELECT count(*) as nb FROM catalogue');
?>
<!--Tableau contenant la liste des opération -->
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste des opérations</title>

    <!-- bootstrap part -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


    <!-- Icone part -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--CSS part-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Font part -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">




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
            <a class="nav-link" href="../controller/logout.php">
               <i class="fa fa-sign-out"></i> Déconnexion

            </a>

          </li>
        </ul>
      </div>
      </nav>


<!--colonne pour le menu vertical-->

    <div class="container-fluid">
      <div class="row">
        <div class="col col-md-auto menu">
          <nav class="nav flex-column bg-light">
            <a class="nav-link active" href=" ">Tableau de bord</a>
          </nav>

        </div>
        <div class="col OP">

          <?php
            $data = $nbligne->fetch();
            $nb = $data['nb'];

          ?>

          <h3 class="text-left">Liste des opérations <?php echo '('.$nb.')';?></h3>


          <table class="table table-bordered position-relative tableau">

            <thead class="thead-dark">

              <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Mois de parution</th>
                <th>Année de parution</th>
                <th>Action</th>
              </tr>

            </thead>

            <tbody>

               <!--php part -->

              <?php
                while ($donnees = $reponse->fetch()) {?>
                  <tr>
                    <td><?php echo $donnees['numero']; ?></td>
                    <td><?php echo $donnees['nom']; ?></td>
                    <td><?php echo $donnees['moisParution']; ?></td>
                    <td><?php echo $donnees['anneeParution']; ?></td>
                    <td>
               <!--      <a href="modifierListeOP.php?id_update=<?php echo $donnees['idCatalogue'] ?>" data-toggle="tooltip" data-placement="right" title="Modifier">
                        <i class="fa fa-edit"></i>
                      </a> -->
                      <a href="creationOP.php?idCatalogue=<?php echo $donnees['idCatalogue'] ?>" data-toggle="tooltip" data-placement="right" title="Gestion des produits">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
              <?php

                }
                $reponse->closeCursor();
                $nbligne->closeCursor();

              ?>


            </tbody>
          </table>
        </div>
      </div>

    </div>

  </body>
</html>
