<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Inscription</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Identifiant</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Mot de passe</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirmation mot de passe</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Inscription</button>
		</div>
		<p>
			Déjà membre? <a href="login.php">Connexion</a>
		</p>
	</form>
</body>
</html>