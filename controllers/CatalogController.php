<?php

/**
 * Class CatalogController
 * Контроллер для работы с каталогом товаров
 */
class CatalogController {

    /**
     * Просмотр товаров по выбранной категории
     * @param $catId id категории
     * @param int $page текущая страница
     * @return bool
     */
    public function actionCategory($catUriName){
        //Список категорий
        $categories = Category::getCategory();

        //Товары из категории
        $products = Product::getProductListByCatId($catUriName);

        require_once ROOT . '/views/catalog/category.php';

        return true;
    }
}