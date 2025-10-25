<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Src\Controllers\HomeController;

require __DIR__ . '/vendor/autoload.php';
session_start();

$app = AppFactory::create();
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();
$container->set(PhpRenderer::class, function() {
    return new PhpRenderer(__DIR__ . '/templates',
    [
        'categories'=> ORM::forTable('category')->whereNull('category_stages')->findMany(),
    ]);
} );
ORM::configure('mysql:host=database;dbname=docker');
ORM::configure('username', 'root');
ORM::configure('password', 'tiger');
$app->get('/', [\Src\Controllers\MainController::class, 'index']);
//$app->get('/', [HomeController::class, 'index']);
$app->get('/login', [\Src\Controllers\LoginController::class, 'loginPage']);
$app->get('/auth/register', [\Src\Controllers\RegisterController::class, 'registerPage']);
$app->post('/auth/register', [\Src\Controllers\RegisterController::class, 'store']);
$app->post('/auth/login', [\Src\Controllers\LoginController::class, 'login']);
$app->get('/auth/logout', [\Src\Controllers\LoginController::class, 'logout']);
//  категории
//$app->group('/category', function() use ($app) {
$app->get('/category', [\Src\Controllers\CategoryController::class, 'category']);
$app->get('/category/create', [\Src\Controllers\CategoryController::class, 'create']);
$app->post('/category/store', [\Src\Controllers\CategoryController::class, 'store']);
$app->get('/category/{id}/edit', [\Src\Controllers\CategoryController::class, 'edit']);
$app->post('/category/{id}/update', [\Src\Controllers\CategoryController::class, 'update']);
$app->get('/category/{id}/delete', [\Src\Controllers\CategoryController::class, 'delete']);
$app->get('/category/{id}/subcategories', [\Src\Controllers\CategoryController::class, 'subcategories']);


//$app->get ('/categoryProducts', \Src\Controllers\CategoryController::class, 'categoryProducts');
//})->add($container->get(\Slim\Psr7\Factory\ResponseFactory::class));
// продукты
$app->get('/product/create', [\Src\Controllers\ProductsController::class, 'create']);
$app->post('/product/create', [\Src\Controllers\ProductsController::class, 'store']);
$app->get('/product', [\Src\Controllers\ProductsController::class, 'index']);
$app->get('/product/{id}/edit', [\Src\Controllers\ProductsController::class, 'edit']);
$app->post('/product/{id}/update', [\Src\Controllers\ProductsController::class, 'update']);
$app->get('/product/{id}/delete', [\Src\Controllers\ProductsController::class, 'delete']);
// главная
$app->get('/main', [\Src\Controllers\MainController::class, 'index']);
$app->run();
?>