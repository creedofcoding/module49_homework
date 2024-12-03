<?php

namespace App\Controllers;

use Twig\Environment;

class AboutController
{
    public function index(Environment $twig)
    {
        echo $twig->render('about.twig', ['title' => 'О нас']);
    }
}
