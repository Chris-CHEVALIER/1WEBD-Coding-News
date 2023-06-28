<?php require "header.php";
$article = $articleController->get($_GET["id"]); // Récupère l'article dont l'id est passé dans l'URL
?>

<div class="d-flex">
    <?php

    ?>
    <div class="card m-3" style="width: 18rem;">
        <img src="<?= $article->getImage() ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $article->getTitle() ?></h5>
            <p class="card-text"><?= substr($article->getContent(), 0, 150) ?> <?= strlen($article->getContent()) > 150 ? "..." : ""; ?></p>
            <a href="javascript:;" onclick="deployArticle(<?= htmlspecialchars(json_encode($article->getContent()), ENT_QUOTES); ?>, <?= $i ?>)" class="link-primary">Voir plus</a> <br>
            <a href="./articleForm.php?id=<?= $article->getId() ?>" class="btn btn-warning">Modifier</a>
            <a href="javascript:;" onclick="confirmRemove(<?= $article->getId() ?>)" class="btn btn-danger">Supprimer</a>
        </div>
    </div>
</div>




<?php require("./footer.php") ?>