<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Blog\Controller;

use WIT\FullStackBootcamp\Blog\Repository;
use WIT\FullStackBootcamp\Common;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use WIT\FullStackBootcamp\Blog\Model;

class Post implements Common\Controller
{
    /**
     * @var Common\View
     */
    private $view;

    /**
     * @var Repository\Posts
     */
    private $postsRepository;

    /**
     * @var Request
     */
    private $request;

    /**
     * @param Common\View $view
     * @param Repository\Posts $postsRepository
     * @param Request $request
     */
    public function __construct(
        Common\View $view,
        Repository\Posts $postsRepository,
        Request $request
    ) {
        $this->view = $view;
        $this->postsRepository = $postsRepository;
        $this->request = $request;
    }

    public function run(): Response
    {
        $idPost = (int)$this->request->query->get('id');
        $post = $this->getPost($idPost);

        if ($post === null) {
            throw new ResourceNotFoundException();
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'text/html; charset=UTF-8');
        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent($this->view->get(
            'Blog'
            . \DIRECTORY_SEPARATOR
            . 'View'
            . \DIRECTORY_SEPARATOR
            . 'post.twig',
            [
                'post' => [
                    'id' => $post->getId(),
                    'title' => $post->getTitle(),
                    'content' => $post->getContent(),
                    'date' => $post->getDateOfPublication()->format('d-m-Y H:i'),
                    'author_forename' => $post->getAuthor()->getForename(),
                    'author_surname' => $post->getAuthor()->getSurname()
                ]
            ]
        ));

        return $response;
    }

    private function getPost(int $id): ?Model\PostView
    {
        return $this->postsRepository->getOne($id);
    }
}