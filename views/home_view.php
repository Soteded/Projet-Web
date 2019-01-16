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

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Dernière news
          </h3>
          <h1 class="display-4 font-italic"><?=$lastArticle['title']?></h1>
          <p class="lead my-3"><?=$lastArticle['sentence']?></p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"> <?=$lastArticleLeft['category']?> </strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#"><?=substr($lastArticleLeft['title'], 0, 40);
                 if(strlen($lastArticleLeft['title']) > 40) {
                  echo '...';
                }
                ?></a>
              </h3>
              <div class="mb-1 text-muted"><?=date_format(date_create($lastArticleLeft['date']), "Y/m/d H:i")?></div>
              <p class="card-text mb-auto"><?=$lastArticleLeft['sentence']?></p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="/assets/images/thumbnail-1.jpg" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success"><?=$lastArticleRight['category']?></strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#"><?=substr($lastArticleRight['title'],0,40);
                if(strlen($lastArticleRight['title']) >= 40) {
                  echo '...';
                }
                  ?></a>
              </h3>
              <div class="mb-1 text-muted"><?=date_format(date_create($lastArticleRight['date']), "Y/m/d H:i")?></div>
              <p class="card-text mb-auto"><?=$lastArticleRight['sentence']?></p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="/assets/images/thumbnail-2.jpg" alt="Card image cap">
          </div>
        </div>
      </div>
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Nouvelles news
          </h3>


<?php foreach ($allArticles as $index => $article): ?>
         <div class="blog-post">
            <h2 class="blog-post-title"><?=$article['title']?></h2>
            <p class="blog-post-meta"><?=date_format(date_create($article['date']), "Y/m/d H:i")?> par <a href="#"><?=$article['firstname'] . ' ' . $article['lastname']?></a></p>
            <p><?=$article['content']?></p>
          </div><!-- /.blog-post -->
   <?php endforeach?>



          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Archives</a>
            <a class="btn btn-outline-secondary disabled" href="#">Suivant</a>
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">A propos</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>


        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->


<?php include_once 'views/includes/footer.php'?>
  </body>
</html>







<!-- <script src="assets/js/app.js"></script> -->
