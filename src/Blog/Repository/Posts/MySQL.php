<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Blog\Repository\Posts;

use WIT\FullStackBootcamp\Blog\Repository\Posts;
use WIT\FullStackBootcamp\Blog\Model;

class MySQL implements Posts
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @var \DateTimeZone
     */
    private $timezone;

    /**
     * @param PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->timezone = new \DateTimeZone('Europe/Warsaw');
    }

    public function getList(int $page = 1, int $postsPerPage = 10): array
    {
        $sql = "SELECT SUBSTRING(content,1,500) as 'preamble', published as `date`, id, title FROM `Posts` order by published desc LIMIT 3";
        $stmt =$this->pdo->query($sql);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function getOne(int $id): ?Model\PostView
    {
        $sql = "SELECT Posts.id, Posts.title, Posts.content, Posts.published, Posts.author_id, Authors.forename as author_forename, Authors.surname as author_surname, Authors.email as author_email FROM Posts left join Authors on Authors.id = Posts.author_id WHERE Posts.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch();

        return empty($data) ? null : $this->createModel($data);
    }

    private function createModel(array $row): Model\PostView
    {
        return new Model\PostView(
            (int) $row['id'],
            $row['title'],
            substr($row['content'], 0 ,100),
            'https://picsum.photos/id',
            $row['content'],
            new \DateTime($row['published'], $this->timezone),
            new Model\AuthorView(
                (int) $row['author_id'],
                $row['author_forename'],
                $row['author_surname'],
                $row['author_email']
            )
        );
    }

}
