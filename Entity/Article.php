<?php

class Article
{
    // Attributs
    private int $id;
    private string $title;
    private string $content;
    private string $author;
    private string $image;
    private string $favicon;

    // Méthodes
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // Méthode d'hydration générique
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of favicon
     */
    public function getFavicon()
    {
        return $this->favicon;
    }

    /**
     * Set the value of favicon
     *
     * @return  self
     */
    public function setFavicon($favicon)
    {
        $this->favicon = $favicon;

        return $this;
    }
}
