<?php

namespace App\Models;

class Portfolio
{
    // Данные о портфолио
    private static $portfolios = [
        [
            'id' => '1',
            'name' => 'Ноутбуки ASUS ROG',
            'year' => '2024',
            'site' => 'https://www.example.com/',
            'desc' => 'Игровые ноутбуки от ASUS, сочетающие высокую производительность и стильный дизайн.',
        ],
        [
            'id' => '2',
            'name' => 'Телефоны Samsung линейки S',
            'year' => '2024',
            'site' => 'https://www.example.com/',
            'desc' => 'Флагманская линейка смартфонов от Samsung, известная своими инновационными технологиями.',
        ],
        [
            'id' => '3',
            'name' => 'Телефоны Zopo',
            'year' => '2012',
            'site' => 'https://www.example.com/',
            'desc' => 'Устройства от Zopo, сочетающие доступную цену и современные функции.',
        ],
        [
            'id' => '4',
            'name' => 'Телевизоры LG',
            'year' => '2023',
            'site' => 'https://www.example.com/',
            'desc' => 'Качественные телевизоры LG с инновационными функциями и отличным изображением.',
        ],
        [
            'id' => '5',
            'name' => 'Квас Очаково',
            'year' => '2010',
            'site' => 'https://www.example.com/',
            'desc' => 'Освежающий напиток от компании "Очаково", созданный по традиционным рецептам.',
        ],
    ];

    // Получение всех портфолио
    public static function all()
    {
        return self::$portfolios;
    }

    // Получение портфолио по id
    public static function find($id)
    {
        foreach (self::$portfolios as $portfolio) {
            if ($portfolio['id'] === $id) {
                return $portfolio;
            }
        }

        return null; // Если партнёр не найден
    }
}