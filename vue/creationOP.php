<?php
 require_once '../model/connectBd.php';
            
        
        $reponse = $conn->query('SELECT * FROM Produit  WHERE nomPage=\'Page 4\'');
        $reponse2 = $conn->query('SELECT * FROM Produit WHERE nomPage=\'Page 5\'');
?>  

<!-- Tableau contenant les produits et la possibilité de faire la modification -->

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

	    <!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
 

    	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

	    
		<title>Création d'une opération</title>
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
    	                	<i class="fa fa-sign-out"></i>Déconnexion 

    	                </a>
    	           	</li>
    	        </ul>
    	    </div>
    	</nav>
   

    	<!-- menu bar verticale -->

    	<div class="container-fluid">
  			<div class="row">
<!--colonne pour le menu vertical-->
    			<div class="col col-md-auto menu">

      				<nav class="nav flex-column bg-light">
        				<a class="nav-link active tableau" href="accueil.php">Tableau de bord</a>
      				</nav>
    			</div>

    			<!-- tableau de création de produits-->
    			<div class="col ">
    				<h3 class="text-center p4">Page 4</h3>

    				<table class="table table-bordered position-relative tableau1">
    					<thead class="thead-dark">
    						<tr>
    							<th>Nom</th>
    							<th>Visuel</th>
    							<th>Description</th>
    							<th>Dimension</th>
    							<th>Prix</th>
    							<th>Action</th>
    						</tr>
    					</thead>

    					<tbody>

    						<?php
                				while ($donnees = $reponse->fetch()) {?>
                  				<tr>
                    				<td><?php echo $donnees['nom']; ?></td>
                    				<td><img src="/images/<?php echo $donnees['visuel'] ;?>" width="150"/></td>
                    				<td><?php echo $donnees['description']; ?></td>
                    				<td><?php echo $donnees['dimension']; ?></td>
                    				<td><?php echo $donnees['prix']; ?></td>
                    				<td> 
                      					<a href="modifierPrdt.php?id_update=<?php echo $donnees['idprdt']; ?>" data-toggle="tooltip" data-placement="right" title="Modifier">
                        					<i class="fa fa-edit"></i>
                        				</a>
                    				</td>
                  				</tr>
              				<?php  
                				}
                				$reponse->closeCursor();
              				?>
    					</tbody>
    				</table>

    				<h3 class="text-center position-relative page">Page 5</h3>

    				<table class="table table-bordered position-relative tableau2">
    					<thead class="thead-dark">
    						<tr>
    							<th>Nom</th>
    							<th>Visuel</th>
    							<th>Description</th>
    							<th>Dimension</th>
    							<th>Prix</th>
    							<th>Action</th>
    						</tr>
    					</thead>

    					<tbody>

    						<?php
                				while ($donnees2 = $reponse2->fetch()) {?>
                  				<tr>
                    				<td><?php echo $donnees2['nom']; ?></td>
                    				<td><img src="/images/<?php echo $donnees2['visuel']; ?>" width="150"/></td>
                    				<td><?php echo $donnees2['description']; ?></td>
                    				<td><?php echo $donnees2['dimension']; ?></td>
                    				<td><?php echo $donnees2['prix']; ?></td>
                    				<td> 
                      					<a href="modifierPrdt.php?id_update=<?php echo $donnees2['idprdt']; ?>" data-toggle="tooltip" data-placement="right" title="Modifier">
                        					<i class="fa fa-edit"></i>
                        				</a>

                    				</td>
                  				</tr>
              				<?php  
                				}
                				$reponse2->closeCursor();
              				?>
              			
    					</tbody>
    				</table>
    				
    			</div>
    		</div>
    	</div>

	</body>
</html>