<?php

namespace App\Controllers;

use Twig\Environment;

class HomeController
{
    public function index(Environment $twig)
    {
        echo $twig->render('home.twig', ['title' => 'Главная']);
    }
}
