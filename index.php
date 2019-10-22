<?php
ob_start();
session_start();
header("X-XSS-Protection: 0");

// Bывод ошшибок на экран
error_reporting(E_ALL);
ini_set('display_error', 'On');

// Поключение файлов системы
define('ROOT', dirname(__FILE__));
require_once ROOT . '/core/Router.php';
require_once ROOT . '/core/Db.php';
require_once ROOT . '/models/User.php';
require_once ROOT . '/models/Category.php';
require_once ROOT . '/models/Product.php';
require_once ROOT . '/models/Cart.php';
require_once ROOT . '/models/Order.php';
require_once ROOT . '/core/AdminBase.php';
require_once ROOT . '/models/Review.php';
$router = new Router();
$router->start();?>