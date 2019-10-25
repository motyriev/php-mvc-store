<?php

//Контроллер для работы с корзиной
class CartController
{
    /**
     * Добавление товара в корзину
     * @param $productId
     */
    public function actionAdd($productId){

        echo Cart::addProduct($productId);
        return true;
    }
    
    //Удаление товара из корзины
    public function actionDelete($productId){
        Cart::delProduct($productId);
        header('Location: /cart');
    }
    /**
     * Главная страница корзины
     *
     * @return bool
     */
     public function actionIndex (){

        $categories = array();
        $categories = Category::getCategory();

        $productsInCart = false;

        //Получаем данные из корзины
        $productsInCart = Cart::getProducts();
        if($productsInCart){

            //Получаем полную информацию о товаре
            $productsId = array_keys($productsInCart);

            $products = Product::getProductsById($productsId);

            //Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once ROOT . '/views/cart/index.php';

        return true;
    }

    //оформление заказа
    public function actionCheckout(){
        $productsInCart = Cart::getProducts();
        if($productsInCart == false){
            header('Location: /');
        }

        //Список категорий для сайдбара
        $categories = Category::getCategory();
        
        //Общая стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsById($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        //Кол-во товаров
        $totalQuantity = Cart::itemsCount();

        //Поля для формы
        $userName ='';
        $userPhone = '';
        $userText = '';

        //Статус успешного оформления заказа
        $res = false;

        //Проверка на авторизацию
        if(!User::isGuest()){
            //если не гость, получаем данные о пользователе из БД
            $userId = User::checkLog();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        }else{
            //Если гость, то поля формы будут пустыми
            $userId = false;
        }

        //Обработка формы
        if(isset($_POST) and !empty($_POST)){
            $userName = trim(strip_tags($_POST['name']));
            $userPhone = trim(strip_tags($_POST['tel']));
            $userText = trim(strip_tags($_POST['comment']));
        }

        //Флаг ошибок
        $errors = false;
            //Валидация полей
            if (!User::checkLastName($userName))
                $errors[] = 'Имя не может быть короче 2-х символов';

            if (!User::checkPhone($userPhone))
                $errors[] = 'Введите корректный номер';
            
            if($errors == false)
            {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $res = Order::save($userId, $userName, $userPhone, $productsInCart, $userText, $user['postoffice_id']);
               
                if($res){
                    // Если заказ успешно сохранен
                    // Оповещаем администратора о новом заказе по почте
                    $adminEmail = 'RocketaTemo@gmail.com';
                    $message = '<a href="http://e-shopper.esy.es/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);

                    // Очистка корзины
                    Cart::clear();
                }
            }
        require_once ROOT . '/views/cart/checkout.php';
        return true;
    }
}