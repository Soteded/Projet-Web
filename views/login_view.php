<?php include('../controllers/server_controller.php') ?>
<!DOCTYPE html>
<html>
<head>
<head>
    <?php require 'views/includes/head.php'?>
    <link rel="stylesheet" href="assets/styles/css/admin.css">
    <title>Administration </title>
	<link rel="stylesheet" type="text/css" href="assets/styles/css/style.css">
</head>
<body>

	<div class="header">
		<h2>Administration</h2>
		<a href="/home" class="btn" name="return_home">Retour à l'accueil</a>
	</div>
	
	<form method="post" action="controllers/server_controller.php" class="small">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Identifiant</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Mot de passe</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Connexion</button>
			
		</div>
	</form>


</body>
</html>