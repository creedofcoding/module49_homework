<?php

namespace App\Controllers;

use Twig\Environment;
use App\Models\Partner;

class PartnerController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    // Отображение всех партнёров
    public function index()
    {
        $partners = Partner::all(); // Получаем список всех партнёров

        echo $this->twig->render('partners/index.twig', [
            'title' => 'Наши партнёры',
            'partners' => $partners,
        ]);
    }

    // Метод для отображения конкретного партнёра
    public function show($id)
    {
        // Проверяем ID на корректность (например, формат "111-11-111")
        if (!preg_match('/^\d{3}-\d{2}-\d{3}$/', $id)) {
            http_response_code(404);
            echo $this->twig->render('errors/404.twig', ['title' => 'Партнёр не найден']);
            return;
        }

        // Получаем данные партнёра
        $partner = Partner::find($id);

        // Если партнёр не найден, показываем 404
        if (!$partner) {
            http_response_code(404);
            echo $this->twig->render('errors/404.twig', ['title' => 'Партнёр не найден']);
            return;
        }

        // Если найден, отображаем страницу партнёра
        echo $this->twig->render('partners/show.twig', [
            'title' => $partner['name'],
            'partner' => $partner,
        ]);
    }
}
