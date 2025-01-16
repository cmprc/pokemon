<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class Home
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return new Response(
            '<html><body>Hello World!</body></html>'
        );
    }
}
