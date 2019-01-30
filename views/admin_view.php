<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Vous devez être connecté pour accéder à cette page";
		header('location: /login');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: /login");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'views/includes/head.php'?>
	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/css/admin.css">
</head>
<body>
	<div class="header">
		<h2>Administration</h2>
	</div>
	<div class="content_admin">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) { ?>
			<p>Bienvenue <strong><?php echo ucfirst($_SESSION['username']); ?></strong></p>
			<?php 
			$username = $_SESSION['username'];

			$checkrank = $db->prepare("SELECT `rank` FROM `tbl_user` WHERE user_login = '".$username."'");
			$checkrank->execute();
			while($row = $checkrank->fetch()) {
				// var_dump($row); --> Return "Admin" ! Good ;)
    			if(strtolower($row['rank']) == 'admin') { ?>
					<p> <a href="/listenews" style="color: red;">Liste des news</a> </p>
				<?php } ?>
			<p> <a href="/disconnect" style="color: red;">Se deconnecter</a> </p>
		<?php } } ?>
	</div>
		
</body>
</html>