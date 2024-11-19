<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ListController
{
    public function __construct(private string $postgresDsn) {}

    #[Route(path: '/list', name: 'list')]
    public function __invoke(): Response
    {
	$pdo = new \PDO($this->postgresDsn);
        $statement = $pdo->query('SELECT * FROM stuff');

        $content = '<ul>';
        foreach ($statement->fetchAll() as $row) {
            $content .= "<li>{$row['id']} : {$row['name']}</li>";
        }
        $content .= '</ul>';

        return new Response($content);
    }

}

