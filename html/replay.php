<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet Brocoli</title>
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	<?php require "header.html" ?>

	<div  class="col-md-2"> 
			<br>
			<h1>Modèles :</h1>
			<hr>
	</div>
	<div id="rename" >
		
				 <a class="police"> Renommer le fichier : </a> 
				<input type="text"  size="50">
	
	</div>

	<div>
		<label class="police col-md-3 row" >Changer la valeur :</label>
		<span class="vertical-line"></span>
		<label class="police" id="struct">Changer la structure :</label>

		<button type="button" class="btn btn-lg btn-primary" disabled>Click here</button>
		<button type="button" class="btn btn-lg btn-primary" disabled>Click here</button>
	</div>
	<div class="rounded"> 
			<table class="table table-bordered col-md-3" >
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

</div>



	<?php require "footer.html" ?>
</body>
</html>