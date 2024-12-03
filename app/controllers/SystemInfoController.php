<?php

namespace App\Controllers;

use Twig\Environment;

class SystemInfoController
{
    public function index(Environment $twig)
    {
        // Захватываем вывод phpinfo() в буфер
        ob_start();
        phpinfo();
        $phpinfoContent = ob_get_clean();

        // Извлекаем только содержимое <body>
        preg_match('/<body>(.*?)<\/body>/is', $phpinfoContent, $matches);
        $bodyContent = $matches[1] ?? 'Ошибка при получении информации о системе.';

        // Передаём только содержимое <body> в шаблон
        echo $twig->render('system_info.twig', [
            'title' => 'О системе',
            'phpinfoContent' => $bodyContent,
        ]);
    }
}
