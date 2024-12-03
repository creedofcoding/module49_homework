<?php

namespace App\Controllers;

use Twig\Environment;
use App\Models\Portfolio;

class PortfolioController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    // Отображение всех партнёров
    public function index()
    {
        $portfolios = Portfolio::all(); // Получаем список всех портфолио

        echo $this->twig->render('portfolios/index.twig', [
            'title' => 'Наши портфолио',
            'portfolios' => $portfolios,
        ]);
    }

    // Метод для отображения конкретного портфолио
    public function show($id)
    {
        // Проверяем, является ли ID целым числом
        if (!is_numeric($id)) {
            http_response_code(404);
            echo $this->twig->render('errors/404.twig', ['title' => 'Портфолио не найдено']);
            return;
        }

        // Получаем данные портфолио
        $portfolio = Portfolio::find($id);

        // Если портфолио не найдено, показываем 404
        if (!$portfolio) {
            http_response_code(404);
            echo $this->twig->render('errors/404.twig', ['title' => 'Портфолио не найдено']);
            return;
        }

        // Если найден, отображаем страницу партнёра
        echo $this->twig->render('portfolios/show.twig', [
            'title' => $portfolio['name'],
            'portfolio' => $portfolio,
        ]);
    }
}
