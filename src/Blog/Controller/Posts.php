<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Blog\Controller;

use WIT\FullStackBootcamp\Blog\Repository;
use WIT\FullStackBootcamp\Common;
use Symfony\Component\HttpFoundation\Response;

class Posts implements Common\Controller
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
     * @param Common\View $view
     * @param Repository\Posts $postsRepository
     */
    public function __construct(Common\View $view, Repository\Posts $postsRepository)
    {
        $this->view = $view;
        $this->postsRepository = $postsRepository;
    }

    public function run(): Response
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'text/html; charset=UTF-8');
        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent($this->view->get(
            'Blog'
            . \DIRECTORY_SEPARATOR
            . 'View'
            . \DIRECTORY_SEPARATOR
            . 'posts.twig',
            [
                'posts' => $this->getPosts(1, 10)
            ]
        ));

        return $response;
    }

    private function getPosts(): array
    {
        $posts = [
            ["id" => "1", 
            "title" => "Jak efektywnie nauczyć się programować?", 
            "preamble" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).", 
            "date" => "10-02-2020",
            "image" => "/img/BlogPostHeader.jpg"], 
            
            ["id" => "2", "title" => "PHP - yay or nay?", 
            "preamble" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).", 
            "date" => "16-02-2020",
            "image" => "https://my-test-11.slatic.net/shop/1240135492a9f2e557b7e2e7caebd097.png_1200x1200q75.jpg_.webp"], 
            
            ["id" =>"3", 
            "title" => "PHP, SQL i inne bajery", 
            "preamble" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).", 
            "date" => "20-02-2020",
            "image" => "https://image.freepik.com/foto-gratis/suministros-regreso-escuela_90258-1191.jpg"]
        ];

        return $posts;
    }
}
