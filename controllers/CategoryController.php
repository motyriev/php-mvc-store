<?php
/**
 * Class CategoryController
 * Контроллер для работы с каталогом товаров
 */
class CategoryController {
    /**
     * Просмотр товаров по выбранной категории
     * @param $categoryName название категории
     * @return bool
     */
    public function actionCategory($categoryAlias){

        $products ='';
        $category = Category::getCategoryByAlias($categoryAlias);

        //хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category['id']);

        if(!empty($_POST['filter']))
        {
            $filter = Filter::getFilter();
            if($filter){
                $count = Filter::getCountGroups($filter);
                $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter) GROUP BY product_id HAVING COUNT(product_id) = $count)";
                $products = Product::getProductListByCatId($category['id'], $sql_part);
                require_once ROOT . '/views/catalog/filter.php';
                die;
            }
        }
        else $products = Product::getProductListByCatId($category['id']);

        //Товары из категории
        require_once ROOT . '/views/catalog/category.php';
        return true;
    }
}