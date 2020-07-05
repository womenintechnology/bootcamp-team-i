<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Common;

use Symfony\Component\HttpFoundation\Response;

class View
{
    /**
     * @var \Twig\Environment
     */
    private $twig;

    /**
     * @param \Twig\Environment $twig
     */
    public function __construct(\Twig\Environment $twig)
    {
        $this->twig = $twig;
    }

    public function get(string $file, array $parameters = []): string
    {
        return $this->twig->render($file, $parameters);
    }
}
