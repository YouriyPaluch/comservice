<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Index extends AbstractController
{
    #[Route('/', name: 'home')]
    #[Template('index/index.html.twig')]
    public function index(): array
    {
        $number = random_int(0, 100);

        return [
            'number' => $number,
        ];
    }
}