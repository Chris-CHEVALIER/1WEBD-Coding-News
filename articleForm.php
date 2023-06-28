<?php require("./header.php") ?>
<h1>Rédiger un article</h1>

<?php

// Si un id est passé dans l'URL, on récupère l'article correspondant (modification sinon création)
$currentArticle = NULL;
if ($_GET) {
    $currentArticle = $articleController->get($_GET["id"]);
}

// Si le formulaire a été soumis
if ($_POST) {
    $newArticle = new Article($_POST); // Créé un objet à partir des informations saisies par l'utilisateur
    if ($_GET) { // Si modification
        $newArticle->setId($_GET["id"]); // Met à jour l'id associé à l'objet de l'article
        $articleController->update($newArticle); // Met à jour en BDD
    } else { // Si création 
        $articleController->add($newArticle); // Créé en BDD
    }
    echo "<script>window.location.href='index.php'</script>"; // Redirige sur la page d'accueil du site
}
?>

<form class="mx-5" method="POST">
    <label for="title" class="form-label">Titre</label>
    <input type="text" value="<?= $currentArticle ? $currentArticle->getTitle() : "" ?>" name="title" id="title" placeholder="Le titre de l'article" minlength="5" maxlength="120" class="form-control">
    <label for="image" class="form-label">Image</label>
    <input type="url" value="<?= $currentArticle ? $currentArticle->getImage() : "" ?>" name="image" id="image" placeholder="L'URL d'image de l'article" minlength="5" maxlength="120" class="form-control">
    <label for="author" class="form-label">Auteur</label>
    <input type="text" value="<?= $currentArticle ? $currentArticle->getAuthor() : "" ?>" name="author" id="author" placeholder="L'auteur de l'article" minlength="5" maxlength="120" class="form-control">
    <label for="content" class="form-label">Contenu</label>
    <textarea name="content" id="content" placeholder="Le contenu de l'article" minlength="10" maxlength="1200" class="form-control"><?= $currentArticle ? $currentArticle->getContent() : "" ?></textarea>
    <input type="submit" value="Publier" class="btn btn-primary mt-2">
</form>

<?php require("./footer.php") ?>