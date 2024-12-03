<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ContactController;
use App\Controllers\SystemInfoController;
use App\Controllers\PartnerController;
use App\Controllers\PortfolioController;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new FilesystemLoader('../app/Views');
$twig = new Environment($loader);

$uri = trim($_SERVER['REQUEST_URI'], '/');

switch ($uri) {
    case '':
        (new HomeController())->index($twig);
        break;
    case 'about':
        (new AboutController())->index($twig);
        break;
    case 'contact':
        (new ContactController())->index($twig);
        break;

    case 'partners':
        (new PartnerController($twig))->index();
        break;
    case (preg_match('/^partners\/([\d-]+)$/', $uri, $matches) ? true : false):
        (new PartnerController($twig))->show($matches[1]);
        break;

    case 'portfolios':
        (new PortfolioController($twig))->index();
        break;
    case (preg_match('/^portfolios\/([\d-]+)$/', $uri, $matches) ? true : false):
        (new PortfolioController($twig))->show($matches[1]);
        break;

    /* case 'system_info':
        (new SystemInfoController())->index($twig);
        break; */
    default:
        http_response_code(404);
        echo $twig->render('errors/404.twig', ['title' => '404 | Страница не найдена']);
}
