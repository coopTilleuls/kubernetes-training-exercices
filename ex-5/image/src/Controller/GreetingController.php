<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class GreetingController
{
    #[Route(path: '/', name: 'greeting')]
    public function __invoke(): Response
    {
        return new Response('Hello World!');
    }
}
