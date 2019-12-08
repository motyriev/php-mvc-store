<?php
/**
 * Class IndexController
 * Контроллер главной страницы
 */
class IndexController
{
	public function actionIndex()
	{
		// Последние продукты
		//$latestProducts = Product::getLatestProducts();

        require_once ROOT . '/views/index/index.php';
		return true;
	}
}
