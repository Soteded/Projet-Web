<?
session_start();
?>
<html>
    <head>
    <head>
    <?php require 'views/includes/head.php'?>
</head>
	</head>
	<body>

 <?php   
      // Si la variable de session "LOGIN" n'est pas respectée (Si l'on est pas connecté) alors on inclu le formulaire et on prévient
      if(!isset($_SESSION['username'])) { ?>
  <p class="warning"><strong>Attention!</strong> Vous n'êtes pas autorisé à accéder à cette zone</div>
  <?php
  include_once 'login.html';
    exit();
      }
?>
	</body>
</html>
