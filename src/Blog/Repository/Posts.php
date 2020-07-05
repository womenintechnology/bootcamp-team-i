<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Blog\Repository;

use WIT\FullStackBootcamp\Blog\Model;

interface Posts
{
    /**
     * @param int $page
     * @param int $postsPerPage
     * @return Model\PostView[]
     */
    public function getList(int $page = 1, int $postsPerPage = 10): array;

    /**
     * @param int $id
     * @return Model\PostView|null
     */
    public function getOne(int $id): ?Model\PostView;
}
