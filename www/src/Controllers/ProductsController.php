<?php

namespace Src\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ProductsController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        $products = \ORM::forTable('product')->findArray();
        return $this->renderer->render($response, 'product/index.php', [
            'products' => $products,
        ]);
    }
    public function delete(RequestInterface  $request, ResponseInterface $response, array $args,)
    {
        $id = $args['id'];
        \ORM::forTable('product')->findOne($id)->delete();
        return $response->withHeader('Location', '/product')->withStatus(302);
    }

    public function create(RequestInterface $request, ResponseInterface $response)
    {
        $categories = \ORM::forTable('category')->findArray();
        return $this->renderer->render($response, 'product/create.php', [
            'categories' => $categories,
        ]);
    }

    public function store(RequestInterface $request, ResponseInterface $response)
    {
        $name = $request->getParsedBody()['name'];
        $categoryId = $request->getParsedBody()['category_id'];
        $propertyId = $request->getParsedBody()['property_id'] ?? null;
        $product = \ORM::forTable('product')->create();
        $product['name'] = $name;
        $product['category_id'] = $categoryId;

        // если property не пустое
        if (!empty($propertyId)) {
            $product['property_id'] = $propertyId;
        }

        $product->save();
        return $response->withHeader('Location', '/product')->withStatus(302);
    }

    public function edit(RequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];
        $product = \ORM::forTable('product')->findOne($id);
        $categories = \ORM::forTable('category')->findArray();

        return $this->renderer->render($response, 'product/update.php', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];
        $name = $request->getParsedBody()['name'];
        $categoryId = $request->getParsedBody()['category_id'];
        $propertyId = $request->getParsedBody()['property_id'] ?? 0;

        $product = \ORM::forTable('product')->findOne($id);
        $product->set([
            'name' => $name,
            'category_id' => $categoryId,
            'property_id' => $propertyId,
        ])->save();

        return $response->withHeader('Location', '/products')->withStatus(302);
    }

}