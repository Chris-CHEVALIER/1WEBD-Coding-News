<!DOCTYPE html>
<html lang="fr-FR">
<?php
function loadClass(string $class): void
{

    if (str_contains($class, "Controller")) {
        require "./Controller/$class.php";
    } else {
        require "./Entity/$class.php";
    }
}

spl_autoload_register("loadClass");

$articleController = new ArticleController();
$article = $articleController->get($_GET["id"]);
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" href="<?= $article->getFavicon() ?>" />
    <title>Coding News</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Coding News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./articleForm.php">Rédiger un article</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Coding News</h1>

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