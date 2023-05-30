<?php require("./header.php") ?>
<h1>Coding News</h1>

<div class="d-flex">
    <?php
    $articles = $articleController->getAll();

    foreach ($articles as $article) { ?>
        <div class="card m-3" style="width: 18rem;">
            <img src="<?= $article->getImage() ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $article->getTitle() ?></h5>
                <p class="card-text"><?= $article->getContent() ?></p>
                <a href="./articleForm.php?id=<?= $article->getId() ?>" class="btn btn-warning">Modifier</a>
                <a href="./remove.php?id=<?= $article->getId() ?>" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    <?php } ?>
</div>




<?php require("./footer.php") ?>