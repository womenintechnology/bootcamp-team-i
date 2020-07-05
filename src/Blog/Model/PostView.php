<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Blog\Model;

class PostView
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $preamble;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $dateOfPublication;

    /**
     * @var AuthorView
     */
    private $author;

    /**
     * @param int $id
     * @param string $title
     * @param string $preamble
     * @param string $url
     * @param string $content
     * @param \DateTime $dateOfPublication
     * @param AuthorView $author
     */
    public function __construct(
        int $id,
        string $title,
        string $preamble,
        string $url,
        string $content,
        \DateTime $dateOfPublication,
        AuthorView $author
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->preamble = $preamble;
        $this->url = $url;
        $this->content = $content;
        $this->dateOfPublication = $dateOfPublication;
        $this->author = $author;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPreamble(): string
    {
        return $this->preamble;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfPublication(): \DateTime
    {
        return $this->dateOfPublication;
    }

    /**
     * @return AuthorView
     */
    public function getAuthor(): AuthorView
    {
        return $this->author;
    }
}
