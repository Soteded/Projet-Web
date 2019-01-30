<?php
session_start();


// Au cas ou on essaye de se déconnecter sans être connecté
include('verif.php');

// Destruction des cookies de session
session_destroy();

// Redirection vers l'index du site
echo "<script type='text/javascript'>document.location.replace('/admin');</script>";
exit();
?>

<html>
    <head>
    <head>
    <?php require 'views/includes/head.php'?>
</head>