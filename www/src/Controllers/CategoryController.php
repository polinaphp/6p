<?php

namespace Src\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CategoryController extends Controller
{


        public function category(RequestInterface $request, ResponseInterface $response)
    {
        $categories = \ORM::forTable('category')->findArray();

        foreach ($categories as &$category) {
            $category['products'] = \ORM::forTable('product')->where('category_id', $category['id'])->findArray();
        }

        return $this->renderer->render($response, "category/index.php", [
            'categories' => $categories,
        ]);
    }


    public function create(RequestInterface $request, ResponseInterface $response)
    {
        $parentCategories = \ORM::forTable('category')->findArray();
        return $this->renderer->render($response, 'category/create.php', [
            'parentCategories' => $parentCategories,
        ]);
    }

    public function store(RequestInterface $request, ResponseInterface $response)
    {
        $name = $request->getParsedBody()['name'];
        $parentId = $request->getParsedBody()['category_stages'] ?: null; // Сохраняем null вместо пустой строки
        $category = \ORM::forTable('category')->create();
        $category['name'] = $name;
        $category['category_stages'] = $parentId; // Сохранение родительской категории
        $category->save();
        return $response->withHeader('Location', '/category')->withStatus(302);
    }

    public function edit(RequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];
        $category = \ORM::forTable('category')->findOne($id);
        $parentCategories = \ORM::forTable('category')->findArray();
        return $this->renderer->render($response, 'category/update.php', [
            'category' => $category,
            'parentCategories' => $parentCategories,
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];
        $name = $request->getParsedBody()['name'];
        $parentId = $request->getParsedBody()['category_stages'] ?: null; // Сохраняем null вместо пустой строки
        $category = \ORM::forTable('category')->findOne($id);
        $category->set([
            'name' => $name,
            'category_stages' => $parentId,
        ])->save();
        return $response->withHeader('Location', '/category')->withStatus(302);
    }

    public function delete(RequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];
        \ORM::forTable('category')->findOne($id)->delete();
        return $response->withHeader('Location', '/category')->withStatus(302);
    }
//    public function categoryProducts(RequestInterface $request, ResponseInterface $response)
//    {
//        $categories = \ORM::forTable('category')->findOne();
//        $products = \ORM::forTable('products')->findArray();
//
//    }
    public function subcategories(RequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];
        $subcategories = \ORM::forTable('category')->where('category_stages', $id)->findArray();
        foreach ($subcategories as &$subcategory) {
            $subcategory['products'] = \ORM::forTable('product')->where('category_id', $subcategory['id'])->findArray();
        }


        return $this->renderer->render($response, 'category/subcategories.php', [
            'subcategories' => $subcategories,
        ]);
    }


}