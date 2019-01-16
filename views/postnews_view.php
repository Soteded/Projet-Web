<? session_start(); ?>
<?php
    // Au cas ou on essaye d'aller sur la page sans être connecté
    include('verif.php');
?>
<!DOCTYPE HTML>
<html>
<body>
<head>
    <?php require 'views/includes/head.php'?>
    <link rel="stylesheet" href="assets/styles/css/admin.css">
    <title><?=ucfirst($page)?> - Mon site</title>
</head>
<div id="header">
    <h2>Poster une news</h2>
</div>
<div id="container">
<a class="btn btn-disc" href="/listenews"><i class="fas fa-angle-double-left" style="color: #339af0;"></i> Retour aux news</a>

<form action="/listenews" method="post">


<fieldset>
    <legend>Titre : </legend>
    <input type="text" size="100" name="title"/></p>
</fieldset>


<fieldset>
    <legend>Categorie : </legend>
<select name="category">

<?php foreach ($allCategories as $index => $categorie): ?>
          <option value="<?=$categorie['id'] ?> " > <?=$categorie['name']?> </option>
<?php endforeach ?>

</select>
</fieldset>

<fieldset>
    <legend>Sentence : </legend>
    <textarea rows="5" cols="100" name="sentence"></textarea>
</fieldset>

<fieldset>
    <legend>Contenu : </legend>
    <textarea rows="10" cols="100" name="content"></textarea><br />
</fieldset>
    <input type="submit" value="Envoyer" />
</p>
    <input type="hidden" name="author_id" value="1"/>
</form>
</div>



</body>
</html>
