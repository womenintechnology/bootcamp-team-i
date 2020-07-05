<?php
declare(strict_types = 1);

namespace WIT\FullStackBootcamp\Common;

use Symfony\Component\HttpFoundation\Response;

interface Controller
{
    /**
     * @return Response
     */
    public function run(): Response;
}
