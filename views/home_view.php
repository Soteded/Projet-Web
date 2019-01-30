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
          <p class="lead mb-0"><a href="/article?id=<?=$lastArticle['id']?>" class="text-white font-weight-bold">Continue reading...</a></p>
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
              <a href="/article?id=<?=$lastArticleLeft['id']?>">Continue reading</a>
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
              <a href="/article?id=<?=$lastArticleRight['id']?>">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="/assets/images/thumbnail-2.jpg" alt="Card image cap">
          </div>
        </div>
      </div>
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">Nouvelles news</h3>

          <?php
          $pageAct = $_GET['pageArticle'];
					if(!$pageAct || $pageAct == 0 || !is_numeric($pageAct)){
							$pageAct = 1;
					}

					$nombreDeNewsParPage = 1;
						
          $retour = $db->prepare('SELECT * FROM articles ORDER BY id DESC');
          $retour->execute();
					$donnees = $retour->fetchAll();
          $i = 0;
          //var_dump($pageAct);
          //var_dump($page);
          //var_dump($_GET['page']);
					$nbpage = ceil(count($donnees)/$nombreDeNewsParPage);
					while($i < $nombreDeNewsParPage && $i+$nombreDeNewsParPage*($pageAct-1) < count($donnees)){
						$numdonnee = ($pageAct-1==0)? $i : $i+$nombreDeNewsParPage*($pageAct-1);
					?>
         
          <div class="blog-post">
            <h2 class="blog-post-title"><a href="/article?id<?=$donnees[$numdonnee]['id']?>" style="color:black;font-size:36px;"><?=$donnees[$numdonnee]['title']?></a></h2>
            <p class="blog-post-meta"><?=date_format(date_create($donnees[$numdonnee]['date']), "Y/m/d H:i")?> par <a href="#"><?=$donnees[$numdonnee]['firstname'] . ' ' . $donnees[$numdonnee]['lastname']?></a></p>
            <p><?=$donnees[$numdonnee]['content']?></p>
          </div><!-- /.blog-post -->
          
          <?php
          $i++;
					}
						echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
					for($i=1; $i<=$nbpage; $i++) //On fait notre boucle
					{
							if($i==$pageAct) //Si il s'agit de la page actuelle...
							{
									echo ' [ '.$i.' ] '; 
							}	
							else //Sinon...
							{
										echo ' <a href="/home?pageArticle='.$i.'">'.$i.'</a> ';
							}
					}
					?>



          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Archives</a>
            <a class="btn btn-outline-secondary disabled" href="#">Suivant</a>
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">A propos</h4>
            <p class="mb-0">
                <?php 
                $req = $db->prepare('SELECT * FROM articles WHERE category_id = 999');
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