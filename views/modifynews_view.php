<? session_start(); ?>
<?php
    // Au cas ou on essaye d'aller sur la page sans être connecté
    include('verif.php');
?>
<?php

if ( isset($_GET['id']) )
{
    $res = $db->prepare("SELECT * FROM articles WHERE id = ".$_GET['id']." ");
    $res->execute();
    $row = $res->fetch();
    //var_dump($row);
?>
<!DOCTYPE HTML>
<html>
<body>
<head>
    <?php require 'views/includes/head.php'?>
    <link rel="stylesheet" href="assets/styles/css/admin.css">
    <title>Modifier une News - Mon site</title>
</head>

  <div id="header">
    <h2>Modifier une news</h2>
</div>
 <div id="container">
 <a class="btn btn-disc" href="/listenews"><i class="fas fa-angle-double-left" style="color: #339af0;"></i> Retour aux news</a>
<form action="/listenews" method="post">

    <fieldset>
        <legend>Titre : </legend>
        <input type="text" size="100" name="title" value="<?= $row['title'] ?>" /></p>
    </fieldset>
    <fieldset>
        <legend>Catégorie : </legend>
        <select name="category">
<?php foreach ($allCategories as $index => $categorie): ?>
          <option value="<?=$categorie['id'] ?> " > <?=$categorie['name']?> </option>
<?php endforeach ?>
</select>
    </fieldset>
    <fieldset>
        <legend>Sentence : </legend>
        <textarea rows="5" cols="100" name="sentence"><?= rtrim($row['sentence']); ?></textarea>
    </fieldset>

    <fieldset>
        <legend>Contenu : </legend>
        <textarea rows="10" cols="100" name="content"><?= rtrim($row['content']); ?></textarea><br />
        <input type="hidden" name="id_modif" value="<?= $row['id'] ?>" />
    </fieldset>
    <input type="submit" value="Envoyer" />
    
</form>
</div>

<?php } 
?>
