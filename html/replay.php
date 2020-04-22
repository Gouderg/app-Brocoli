<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet Brocoli</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	<?php require "header.html" ?>

	<br><br><br><br><br>
	
	<form method="post">

		<div class="col-sm-2">
			<h1>Modèles :</h1>
			<hr>
		</div>


		<div class="row">
			<div class="col-md-4">
				<section class="container">
					<table class="table" id="tabReplay">
							<!-- Générer par le php -->		
	  					<thead>
	    					<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
					      			
					   		</tr>
						</thead>
						<tbody>
					  		<tr>
					   			<th scope="row">1 </th>
					      		<td> Completer php </td>
					     
					    	</tr>
					    	<tr>
					      		<th scope="row">2</th>
					      		<td>php</td>
					   		 </tr>
					    	<tr>
					      		<th scope="row">3</th>
					     		<td colspan="1">php </td>

	   						</tr>
	   						<tr>
					      		<th scope="row">4 </th>
					      		<td> Completer php </td>
					     
					   		</tr>
					    	<tr>
					      		<th scope="row">.... </th>
					      		<td> Completer php </td>
					     
					    	</tr>
					    	<tr>
					      		<th scope="row">... </th>
					      		<td> Completer php </td>
					     
					    	</tr>
					    	<tr>
					      		<th scope="row">.. </th>
					      		<td> Completer php </td>
					     
					    	</tr>
					    	<tr>
					      		<th scope="row">.. </th>
					      		<td> Completer php </td>
					     
					    	</tr>
					    	<tr>
					      		<th scope="row">.. </th>
					      		<td> Completer php </td>
					     
					    	</tr>
					   		<tr>
					      		<th scope="row">Last </th>
					      		<td> Completer php </td>
					     
					    	</tr>
	 					</tbody>
					</table>
				</section>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group police">
							<label for="renommer" class="col-form-label">Renommer le fichier :</label>
							<hr>
								<input type="text" class="  form-control" id="newfic" value="Nouveau nom du fichier">
						</div>
						<br><br>
					</div>

					<div class="row">
						<div class="col-auto ">			
							<label class="police " id="val"> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  Changer la structure : &nbsp; &nbsp; &nbsp; </label>

							<br><br><br><br><br><br>
						
							<div class="col-auto">
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								<button type="submit" class="btn btn-outline-primary btn-lg" id="btnGenerer"> <a href="index.php">Click here </a></button>						
							</div>
						</div>
						&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; 
						<div class="vertical-line col-auto"> &nbsp; &nbsp; &nbsp; </div>
						<div class="col-auto"> 
							<label class="police " id="val"> &nbsp; &nbsp; &nbsp;  Changer la valeur :</label>

							<br><br><br><br><br><br>
						
							<div class="col-auto">
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
								<button type="submit" class="btn btn-outline-primary btn-lg" id="btnGenerer"> <a href="generate.php"> Click here </a></button>						
							</div>
						</div>
			
					</div>		
				</div>
			</div>
		</div>
	</form>

	<br><br><br><br><br>

	<?php require "footer.html" ?>
</body>
</html>

