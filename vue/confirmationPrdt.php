<?php
require_once '../controller/confirm.php';

require_once '../controller/cheminDeFer.php';
require_once '../controller/Recap.php';
require_once '../controller/mail.php';
?>  
<!--Formulaire de confirmation de modification de produit -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- bootstrap part -->
   
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>

  <!-- Icone part -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!--CSS part-->
  <link rel="stylesheet" type="text/css" href="../css/style.css">

        <!-- Font part -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

 

  <title>Formulaire de création pour les produits</title>
  <!-- Fonction javascript pour compter les mots de titre et description au niveau du formulaire -->

  <script type="text/javascript">

      //count titre
      function countChar(val) {
        var len = val.value.length;
        max = 70;
        if (len >= max) {
          val.value = val.value.addstring(max, 0);
        } else {
          var char = len+1;
          $('#charNum').text('(' + char + ' ' + 'caractères sur ' + max + ')');
        }
      };
//Count description
      function compte(val) {
        var len = val.value.length;
        max = 70;
        if (len >= max) {
          val.value = val.value.addstring(max, 0);
        } else {
          var char = len+1;
          $('#count').text('(' + char + ' ' + 'caractères sur ' + max + ')');
        }
      };


    //Validation du formulaire à l'écoute du bouton
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
                  <a class="nav-link" href="../controller/logout.php">
                    <i class="fa fa-sign-out"></i> Déconnexion 

                  </a>
              </li>
          </ul>
      </div>
    </nav>

      <div class="container-fluid">
        <div class="row">
<!--colonne pour le menu vertical-->
          <div class="col-md-auto menu">

              <nav class="nav flex-column bg-light">
                <a class="nav-link active tableau" href="accueil.php">Tableau de bord</a>
              </nav> 
      
          </div>

          <!-- Formulaire de création de produits-->
          <div class="col-1 offset-1">

            <div class="d-block p-1 mt-4 position-relative form2"> <!--mx-auto-->

              <h6 class="display 2 text-center"><?php echo $response['nomPage'] ?></h6>
              <h6>Modification de produit: <?php echo $response['nom'] ?> </h6>
                
            </div>

           

            <div class="d-block p-1 mt-4 position-relative form"> <!--mx-auto-->
              <h3 class="titre  p-1 mt-2">Modification</h3>

              <?php
              if (isset($errorImg)) { ?>
                <div class="alert alert-danger">
                  <strong><?php echo "$errorImg"; ?></strong>
                        
                </div>
              <?php  
              }
              if (isset($errorMsg)) {
              ?>
                <div class="alert alert-danger">
                  <strong><?php echo "$errorMsg"; ?></strong>   
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
                if (isset($emailMsg)) {
                ?>
                  <div class="alert alert-success">
                    <strong><?php echo "$emailMsg"; ?></strong>   
                  </div>
                 <?php    
                }
                ?>

            

              <form action=" " method="post" enctype="multipart/form-data" role ="form" class="form-horizontal" data-toggle="validator" novalidate="true">

                <div class="d-block offset-2 p-2 mt-0 bg-dark text-white position-relative gene">Informations générales</div> <!--mx-auto-->
                  <div class="d-block offset-2 p-2 mt-0 bg-white contenu">
              <!-- formulaire 1-->
                    <div class="form-row">
                      <div class="form-group col-6">

                     
                            
                         

                       
                        <label for="titre">Nom</label>   <!-- titre -->
                        <input type="text" class="form-control" id="titre" name="nom"  value="<?php echo $nom; ?> " maxlength="70" onkeyup="countChar(this)"  data-error="Entrez un nom de produit" required>
                        <span id = "charNum"></span>
                        <input type="hidden" name="nomPage" value=" "/>
                        <div class="help-block with-errors"></div>     
                      </div>
                      <div class="form-group col-6">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="desc" name="description" value="<?php echo $description; ?> " maxlength="70" onkeyup="compte(this)" data-error="Entrez une description de produit" required>
                        <span id = "count"></span>
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-3">
                          <label for="prix">Prix</label>
                          <input type="text" class="form-control" id="price" name="prix" value="<?php echo $prix; ?>" data-error="Entrez un prix en euro" required>
                           <input type="hidden" name="idprdt" value="" value=" "/>
                          <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group col-3">
                          <label for="prixBarre">Prix barré</label>
                          <input type="text" class="form-control" id="price2" name="prixBarre" value="<?php echo $prixBarre; ?> " data-error="Entrez un prix en euro" required>
                          <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group col-6">
                        <label for="dimension">Dimension</label>
                          <input type="text" class="form-control" id="dimension" name="dimension" value="<?php  echo $dimension; ?> " data-error="Entrez une dimension de produit" required>
                          <input type="hidden" name="idCatalogue" value="; ?> "/>
                          <div class="help-block with-errors"></div> 
                      </div>
                    </div>

                 
                   
                   
                  

                    <!---------------------------------------------------------------------------------------------------------------------------------------->


                    <!-- upload file: en base on enregistre le nom de l'image, ici notre image-->
                   
                    <div class="mb-3">
                      <input type="file" name="fichier" value="<?php echo $visuel ?>"  data-error="Charger une image"  required/> 
                      <div class="help-block with-errors"></div> 
                    </div>
                    
                  </div>
<!--formulaire 2 -->
                <div class="d-block offset-2 p-2 mt-0 bg-dark text-white position-relative comp">Informations complémentaires</div>
                <div class="d-block offset-2 p-2 mt-0 bg-white position-relative contenu2">

                  <div class="form-row">
                    <div class="form-group col-4">
                      <label for="garanti">Garanti</label>
                      <select  name="garanti" class="form-control" id="garanti" value="<?php  echo $garanti; ?> " data-error="Faîtes un choix" required>
                        <option value="">Choisir</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                      </select>
                      <div class="help-block with-errors"></div>
                      
                    </div>
                      <div class="form-group col-4 ml-auto">
                        <label for="fabrication">Fabrication</label>
                          <select name="fabrication" class="form-control" id="fabrication" value="<?php  echo $fabrication; ?> " data-error="Faîtes un choix" required>
                          <option value="">Choisir</option>
                          <option value="1">France</option>
                          <option value="2">Europe</option>
                          <option value="3">Italie</option>
                          <option value="4">Espagne</option>
                          <option value="5">Grande-bretagne</option>
                      </select>
                      <div class="help-block with-errors"></div>
                      
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-4">
                        <label for="produit1">Plus produit 1</label>
                        
                          <select name="produit1" class="form-control" id="produit1" value="<?php  echo $produit1; ?> " data-error="Faîtes un choix" required>
                          <option value="">Choisir</option>
                          <option value="1">image 1</option>
                          <option value="2">image 2</option>
                          <option value="3">image 3</option>
                          <option value="4">image 4</option>
                          <option value="5">image 5</option>
                      </select>
                      <div class="help-block with-errors"></div>

                    </div>
                      <div class="form-group col-4 ml-auto">
                        <label for="produit2">Plus produit 2</label>
                          <select name="produit2" class="form-control" id="produit2" value="<?php  echo $produit2; ?> " data-error="Faîtes un choix" required>
                          <option value="">Choisir</option>
                          <option value="1">image 1</option>
                          <option value="2">image 2</option>
                          <option value="3">image 3</option>
                          <option value="4">image 4</option>
                          <option value="5">image 5</option>
                      </select>
                      <div class="help-block with-errors"></div>
                     
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-4">
                        <label for="produit3">Plus produit 3</label>
                        
                          <select name="produit3" class="form-control" id="produit3" value="<?php  echo $produit3; ?> " data-error="Faîtes un choix" required>
                          <option value="">Choisir</option>
                          <option value="1">image 1</option>
                          <option value="2">image 2</option>
                          <option value="3">image 3</option>
                          <option value="4">image 4</option>
                          <option value="5">image 5</option>
                      </select>
                      <div class="help-block with-errors"></div>
                        
                    </div>
                      
                  </div>
                    
                </div>
<!-- bouton sommettre -->
                <div class="form-group position-relative mb-0">
                  <div class="btn-holder">
                    <button type="submit" name= "btn_confirm" class="btn btn-info d-block offset-5 p-2 mt-5">Confirmer modification</button>
                  </div>
                </div>
                
              </form>   
            </div>
          </div>
        </div>
      </div>

      
      

</body>
</html>