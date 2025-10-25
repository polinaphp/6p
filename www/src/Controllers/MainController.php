<?php

namespace Src\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class MainController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response) {
        $categories = \ORM::forTable('category')
            ->where_null('category_stages')
            ->findArray();

        return $this->renderer->render($response, "main/index.php", [
            'categories' => $categories,
        ]);
    }
}