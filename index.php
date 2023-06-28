<?php require("./header.php") ?>
<h1>Coding News</h1>

<div class="d-flex">
    <?php
    // Équivalent de fetch() avec PHP :
    /* $jsonResponse = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=151&offset=0');
    $pokemons = json_decode($jsonResponse)->results;
    echo "<ul>";
    foreach ($pokemons as $pokemon) {
        echo "<li>{$pokemon->name}</li>";
    }
    echo "</ul>"; */

    $articles = $articleController->getAll(); // Récupère et stocke dans un tableau '$articles' tous les articles de la table du même nom
    $i = 0;

    foreach ($articles as $article) : ?>
        <div class="card m-3" style="width: 18rem;">
            <img src="<?= $article->getImage() ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $article->getTitle() ?></h5>
                <p class="card-text"><?= substr($article->getContent(), 0, 150) ?> <?= strlen($article->getContent()) > 150 ? "..." : ""; ?></p>
                <a href="javascript:;" onclick="deployArticle(<?= htmlspecialchars(json_encode($article->getContent()), ENT_QUOTES); ?>, <?= $i ?>)" class="link-primary">Voir plus</a> <br>
                <a href="./articleForm.php?id=<?= $article->getId() ?>" class="btn btn-warning">Modifier</a>
                <a href="javascript:;" onclick="confirmRemove(<?= $article->getId() ?>)" class="btn btn-danger">Supprimer</a>
                <a href="read.php?id=<?= $article->getId() ?>" class="btn btn-primary">Lire</a>
            </div>
        </div>
    <?php
        $i++;
    endforeach;
    ?>
</div>

<?php require("./footer.php") ?>