<?php

class ArticleController
{
    // Attribut d'interface entre PHP et MySQL (PDO : PHP Data Object)
    private PDO $db;

    // Initialisation de la connexion à la BDD MySQL
    public function __construct()
    {
        $dbName = "coding";
        $port = 8889;
        $host = "localhost";
        $userName = "root";
        $password = "root";
        // Essaye de se connecter à la BDD MySQL avec lien, nom, port et identifiants
        try {
            $this->setDb(new PDO("mysql:host=$host;dbname=$dbName;port=$port;", $userName, $password));
        } catch (PDOException $e) { // Si échoue, affiche le message d'erreur
            echo $e->getMessage();
        }
    }

    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    // CRUD
    // Créer l'article passé en paramètre
    public function add(Article $newArticle)
    {
        // Prépare la requête SQL pour éviter les injections SQL
        $req = $this->db->prepare("INSERT INTO `article` (title, content, author, image) VALUES (:title, :content, :author, :image)");

        // Passe les données sensibles en les échapant pour éviter les attaques XSS 
        $req->bindValue(":title", htmlspecialchars($newArticle->getTitle()), PDO::PARAM_STR);
        $req->bindValue(":content", htmlspecialchars($newArticle->getContent()), PDO::PARAM_STR);
        $req->bindValue(":author", htmlspecialchars($newArticle->getAuthor()), PDO::PARAM_STR);
        $req->bindValue(":image", htmlspecialchars($newArticle->getImage()), PDO::PARAM_STR);

        // Exécute la requête SQL
        $req->execute();
    }

    // Récupère un article en fonction de son id
    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `article` WHERE id = :id");
        $req->bindValue(":id", htmlspecialchars($id), PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch(); // Récupère uniquement la première ligne renvoyée par la requête SQL (tableau unique)
        $article = new Article($data); // Convertit le tableau en objet (hydratation)
        return $article; // Renvoie l'objet représentant l'article
    }

    // Récupère tous les articls stockés dans la table du même nom
    public function getAll()
    {
        $articles = [];
        $req = $this->db->query("SELECT * FROM `article` ORDER BY title");
        
        $datas = $req->fetchAll(); // Récupère toutes les lignes renvoyées par la requête SQL (tableau de tableaux)
        foreach ($datas as $data) { // Boucle sur le tableau de tableaux
            $article = new Article($data); // Convertit le tableau parcouru en objet (hydratation)
            $articles[] = $article; // Ajoute l'objet représentant l'article à un tableau
        }
        return $articles; // Renvoie le tableau des objets représentant des articles
    }

    // Met à jour l'article passé en paramètre
    public function update(Article $updatedArticle)
    {
        $req = $this->db->prepare("UPDATE `article` SET title = :title, content = :content, author = :author, image = :image WHERE id = :id");

        $req->bindValue(":title", htmlspecialchars($updatedArticle->getTitle()), PDO::PARAM_STR);
        $req->bindValue(":content", htmlspecialchars($updatedArticle->getContent()), PDO::PARAM_STR);
        $req->bindValue(":author", htmlspecialchars($updatedArticle->getAuthor()), PDO::PARAM_STR);
        $req->bindValue(":image", htmlspecialchars($updatedArticle->getImage()), PDO::PARAM_STR);
        $req->bindValue(":id", htmlspecialchars($updatedArticle->getId()), PDO::PARAM_INT);

        $req->execute();
    }

    // Supprimer l'article dont l'id est passé en paramètre
    public function remove(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `article` WHERE id = :id");
        $req->bindValue(":id", htmlspecialchars($id), PDO::PARAM_INT);
        $req->execute();
    }
}
