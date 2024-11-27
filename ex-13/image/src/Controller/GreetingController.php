<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class GreetingController
{
    #[Route(path: '/', name: 'greeting')]
    public function __invoke(): Response
    {
        // high CPU for HorizontalPodAutoscaler test
        $num =50000;
        for( $j = 2; $j <= $num; $j++ ) {
            for( $k = 2; $k < $j; $k++ ) {
                if( $j % $k == 0 ) {
                    break;
                }
            }
            if( $k == $j ) {
                //echo "Prime Number : ", $j, "<br>";
            }
        }

        return new Response('Hello World!');
    }
}
