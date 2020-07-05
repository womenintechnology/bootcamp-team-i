<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Api;

use WIT\FullStackBootcamp\Common;
use WIT\FullStackBootcamp\Blog\Repository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Controller implements Common\Controller
{
    /**
     * @var Repository\Posts
     */
    private $postsRepository;

    /**
     * @var Request
     */
    private $request;

    /**
     * @param Repository\Posts $postsRepository
     * @param Request $request
     */
    public function __construct(
        Repository\Posts $postsRepository,
        Request $request
    ) {
        $this->postsRepository = $postsRepository;
        $this->request = $request;
    }

    public function run(): Response
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent(\json_encode($this->getPosts()));

        return $response;
    }

    private function getPosts(): array
    {
        $posts = [];
        $page = (int)$this->request->query->get('page');
        $postsPerPage = (int)$this->request->query->get('postsPerPage');

        return $posts;
    }

}
