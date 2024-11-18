<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ListController
{
    #[Route(path: '/list', name: 'list')]
    public function __invoke(): Response
    {
        $pdo = new \PDO('pgsql:host=postgresql;port=5432;dbname=k8s-training;user=postgres;password=maman');
        $statement = $pdo->query('SELECT * FROM stuff');

        $content = '<ul>';
        foreach ($statement->fetchAll() as $row) {
            $content .= "<li>{$row['id']} : {$row['name']}</li>";
        }
        $content .= '</ul>';

        return new Response($content);
    }
}

