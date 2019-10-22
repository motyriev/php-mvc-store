<?php

class ProductController
{
    public function actionView($productId){

        $categories = Category::getCategory();

        $product = Product::getProductById($productId);
        $reviews = Review::getTopReviewListByProductId($productId);
        require_once ROOT . '/views/single_item/index.php';

        return true;
    }
}