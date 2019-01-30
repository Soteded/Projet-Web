<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'root', 'webdev');

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Le nom d'utilisateur est requis");
		}
		if (empty($password)) {
			array_push($errors, "Le mot de passe est requis");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM tbl_user WHERE user_login='$username' AND user_pwd='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Vous êtes connecté";
				header('location: ../admin');
			}else {
				array_push($errors, "Mauvais mot de passe ou non d'utilisateur !");
			}
		}
	}

?>