<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\AboutUs;

use WIT\FullStackBootcamp\Common;
use Symfony\Component\HttpFoundation\Response;

class Controller implements Common\Controller
{
    /**
     * @var Common\View
     */
    private $view;

    /**
     * @param Common\View $view
     */
    public function __construct(Common\View $view)
    {
        $this->view = $view;
    }

    public function run(): Response
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'text/html; charset=UTF-8');
        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent($this->view->get(
            'AboutUs'
            . \DIRECTORY_SEPARATOR
            . 'View'
            . \DIRECTORY_SEPARATOR
            . 'page.twig'
        ));

        return $response;
    }
}
