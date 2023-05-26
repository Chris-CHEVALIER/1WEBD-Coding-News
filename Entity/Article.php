<?php

class Article
{
    // Attributs
    private int $id;
    private string $title;
    private string $content;
    private string $author;
    private string $image;
    private array $comments;

    public function __construct(int $id, string $title, string $content, string $author, string $image, array $comments)
    {
        $this->setId($id);
        $this->setTitle($title);
        $this->setContent($content);
        $this->setAuthor($author);
        $this->setImage($image);
        $this->setComments($comments);
    }

    // Méthodes
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
