<?php

class ArticleController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "coding";
        $port = 8889;
        $host = "localhost";
        $userName = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;", $userName, $password));
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    public function add(Article $newArticle)
    {
        $req = $this->db->prepare("INSERT INTO `article` (title, content, author, image) VALUES (:title, :content, :author, :image)");

        $req->bindValue(":title", htmlspecialchars($newArticle->getTitle()), PDO::PARAM_STR);
        $req->bindValue(":content", $newArticle->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $newArticle->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":image", $newArticle->getImage(), PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $article = new Article($data);
        return $article;
    }

    public function getAll()
    {
        $articles = [];
        $req = $this->db->query("SELECT * FROM `article` ORDER BY title");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $article = new Article($data);
            $articles[] = $article;
        }
        return $articles;
    }

    public function update(Article $updatedArticle)
    {
        $req = $this->db->prepare("UPDATE `article` SET title = :title, content = :content, author = :author, image = :image WHERE id = :id");

        $req->bindValue(":title", $updatedArticle->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $updatedArticle->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $updatedArticle->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":image", $updatedArticle->getImage(), PDO::PARAM_STR);
        $req->bindValue(":id", $updatedArticle->getId(), PDO::PARAM_INT);

        $req->execute();
    }

    public function remove(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}
