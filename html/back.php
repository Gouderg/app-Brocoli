<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Projet Brocoli</title>
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #CC6600;">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"aria-expanded="true"><img src="../img/icon/Menu.png" width="50%"></a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../html/index.php">Générer un modèle</a> 
					<a class="dropdown-item" href="../html/replay.php">Rejouer un modèle</a>
					<a class="dropdown-item" href="../html/back.php">Back </a>
				</div>
				<div class="text-center"><h1 style="font-weight: bold;">BROCCOLI - DATA GENERATOR</h1></div>
				
			</div>
		</nav>
	</header>

	<br>
	<div class="container">
		<table class="table">
			<tbody>
				<tr>
					<th scope="row">Integer</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actifINT">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">Double-Float</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actifDouble">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">Tiny-Int</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actifTiny">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">Varchar</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actifVarchar">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">Char</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actifChar">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">Boolean</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actifBool">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">Date</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actifDate">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">Time</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actiTime">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">DateTime</th>
					<td>
						<div class="input-group mb-3">
							<select class="custom-select" id="actiDateTime">
								<option value="Actif" selected>Actif</option>
								<option value="Inactif">Inactif</option>
							</select>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	

	<br><br><br><br>
	<footer class="fixed-bottom" style="background-color: #CC6600;">
		<div class="footer-copyright py-3 text-center">
			Copyright PRALAIN Léopold - ILLIEN Victor
		</div>
	</footer>
</body>
</html>