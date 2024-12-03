<?php

namespace App\Controllers;

use Twig\Environment;

class ContactController
{
    public function index(Environment $twig)
    {
        echo $twig->render('contact.twig', ['title' => 'Контакты']);
    }
}
