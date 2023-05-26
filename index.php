<?php require("./header.php") ?>
<h1>Coding News</h1>

<div class="d-flex">
    <?php
    $monArticle1 = new Article(1, "Le langage PHP", "Un super langage !", "Chris Chevalier", "https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/2560px-Webysther_20160423_-_Elephpant.svg.png", []);
    $monArticle2 = new Article(2, "Le langage JavaScript", "Un langage meilleur encore !", "Chris Chevalier", "https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png", []);
    $articles = [$monArticle1, $monArticle2];

    foreach ($articles as $article) { ?>
        <div class="card m-3" style="width: 18rem;">
            <img src="<?= $article->getImage() ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $article->getTitle() ?></h5>
                <p class="card-text"><?= $article->getContent() ?></p>
                <a href="#" class="btn btn-warning">Modifier</a>
                <a href="#" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    <?php } ?>
</div>




<?php require("./footer.php") ?>