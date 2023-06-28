<?php

require("header.php"); // Surtout pour avoir accès à $articleController
$articleController->remove($_GET["id"]); // Supprimer l'article dont l'id est passé dans l'URL
echo "<script>window.location.href='index.php'</script>"; // Redirige sur la page d'accueil du site