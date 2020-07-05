<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Blog\Model;

class AuthorView
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $forename;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $email;

    /**
     * @param int $id
     * @param string $forename
     * @param string $surname
     * @param string $email
     */
    public function __construct(
        int $id,
        string $forename,
        string $surname,
        string $email
    ) {
        $this->id = $id;
        $this->forename = $forename;
        $this->surname = $surname;
        $this->email = $email;
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
    public function getForename(): string
    {
        return $this->forename;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
