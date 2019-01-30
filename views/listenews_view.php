<? session_start(); ?>
<?php
    // Au cas ou on essaye d'aller sur la page sans être connecté
    include('verif.php');
?>

<!DOCTYPE HTML>
<html>
   <head>
       <?php require 'views/includes/head.php'?>
       <link rel="stylesheet" href="assets/styles/css/admin.css">
        <title><?=ucfirst($page)?> - Mon site</title>
      
    </head>
    
    <body>
<?php
$username = $_SESSION['username'];


$checkrank = $db->prepare("SELECT `rank` FROM `tbl_user` WHERE user_login = '".$username."'");
$checkrank->execute();
// var_dump($checkrank);

while($row = $checkrank->fetch()) {
    if(strtolower($row['rank']) == 'admin') {
        // var_dump($row['rank']); --> Return "Admin" (Donc good)
   

//-----------------------------------------------------
// Vérification 1 : est-ce qu'on veut poster une news ou la modifier ???
//-----------------------------------------------------
if (isset($_POST['title']) AND isset($_POST['content']))
{
    if (isset($_POST['id_modif']))
{
    $titre = $_POST['title'];
    $sentence = $_POST['sentence'];
    $contenu = $_POST['content'];
    $idmodif = $_POST['id_modif'];
    $category_id = $_POST['category'];
    $update = $db->prepare("UPDATE articles SET title= '$titre', sentence= '$sentence', content= '$contenu', category_id= '$category_id' WHERE id = ' $idmodif '");
    $update->execute();
    header("Location:/listenews");
}
else {
    $titre = $_POST['title'];
    $sentence = $_POST['sentence'];
    $contenu = $_POST['content'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category'];
    // Verifier si c'est une modif de news
 
        // Modif =/ 0 Donc inserer dans la table
        $post = $db->prepare('INSERT INTO articles (title, sentence, content, author_id, category_id)
        VALUES (?, ?, ?, ?, ?)');
        $post->execute([$titre, $sentence, $contenu, $author_id, $category_id]);
        header("Location:/listenews");
}
 
}
 
//--------------------------------------------------------
// Vérification 2 : est-ce qu'on veut supprimer une news ?
//--------------------------------------------------------
if (isset($_GET['supprimer_news'])) // Si l'on demande de supprimer une news.
{
    // Supprimer la news
    // Eviter injec SQL
    $_GET['supprimer_news'] = addslashes($_GET['supprimer_news']);
    $delete = $db->prepare('DELETE FROM articles WHERE id=\' ' . $_GET['supprimer_news'] . '\' ');
    $auto_inc = $db->prepare('ALTER TABLE articles AUTO_INCREMENT=0');
    $delete->execute([]);
    $auto_inc->execute([]);
}

?>


  <div id="header">
    <h2>Liste des news</h2>
</div>
<div id="container">
<a href="/postnews">
<button class="additems">
    <i class="fas fa-plus"></i>Ajouter une news
</button></a>
<a class="btn btn-disc" href="/disconnect" style="float:right;">
    <i class="fas fa-sign-out-alt"></i> Déconnexion</a>
<div class="table-responsive table--no-card m-b-40">
 <table class="table table-borderless table-striped table-earning">
    <thead>
         <tr>
            <th>Modération</th>
            <th></th>
            <th>Titre</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    <?php
$retour = $db->prepare('SELECT * FROM articles ORDER BY id DESC');
$retour->execute();
while ($donnees = $retour->fetch()) // On fait une boucle pour lister les news.
{
?>
<tr>
<td><div id="modify"><i class="fas fa-edit"> </i> <?php echo '<a href="/modifynews?id=' . $donnees['id'] . '">'; ?>Modifier</a></div></td>
<td><div id="del"><i class="fas fa-trash-alt"> </i> <?php echo '<a href="/listenews?supprimer_news=' . $donnees['id'] . '">'; ?>Supprimer</a></div></td>
<td><?php echo stripslashes($donnees['title']); ?></td>
<td><?=date_format(date_create($donnees['date']), "Y/m/d H:i")?></td>
</tr>
<?php
} } } // Fin de la boucle qui liste les news.
?>
    </tbody>
</table>

</div>
</div>
</body>
</html>
