<?php
if ( isset($_GET['id']) )
    {
        $res = $db->prepare("SELECT * FROM articles WHERE id = ".$_GET['id']." ");
        $res->execute();
        $row = $res->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'views/includes/head.php'?>
    <title><?=ucfirst($page)?> - Mon site</title>
</head>
<body>
    <div class="container">
    <?php include_once 'views/includes/header.php'?>
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
        <?php foreach ($allCategories as $index => $categorie): ?>
          <a class="p-2 text-muted" href="#"><?=$categorie['name']?></a>
          <?php endforeach?>
        </nav>
      </div>

      </div>
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
         <div class="blog-post">
            <h2 class="blog-post-title"><?=$row['title']?></h2>
            <p class="blog-post-meta"><?=date_format(date_create($row['date']), "Y/m/d H:i")?> par <a href="#"><?=$row['firstname'] . ' ' . $row['lastname']?></a></p>
            <p><?=$row['content']?></p>
          </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">A propos</h4>
            <p class="mb-0">
                <?php 
                $req = $db->prepare('SELECT * FROM a_propos');
                $req->execute();
                $aPropos = $req->fetch();
                echo $aPropos['content'];
                ?>
            </p>
          </div>


        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

<?php include_once 'views/includes/footer.php'?>
  </body>
</html>


<?php } 
      else { 
      echo "Vous n'avez pas selectionné d'articles !";
      } ?>