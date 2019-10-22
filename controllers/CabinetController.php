<?php
/**
 * Контроллер для работы с личным кабинетом
 */
class CabinetController
{
    /**
     * Основная страница личного кабинета
     * @return bool
     */
     public function actionIndex(){
        //Получаем id пользователя из сессии
        $userId =  User::checkLog();
        //Получаем всю информацию о пользователе из БД
        $userInfo = User::getUserById($userId);

        require_once ROOT . "/views/cabinet/index.php";
        return true;
    }
    public function actionEdit (){

        //Получаем инфу о юзере из сессии
        $userId = User::checkLog();
        $userInfo = User::getUserById($userId);
        $res = false;

        if (isset($_POST) and (!empty($_POST))){

            //Удаляем теги, пробелы и сохраняем в переменные для проверки
			$firstName = trim(strip_tags($_POST['first_name']));
			$lastName = trim(strip_tags($_POST['last_name']));
			$email = trim(strip_tags($_POST['email']));
			$phone = trim(strip_tags($_POST['phone']));
			$password = trim(strip_tags($_POST['password']));
			$city = trim(strip_tags($_POST['city']));
            $postal = trim(strip_tags($_POST['postal']));

            //Флаг ошибок
            $errors = false;

            //Валидация полей
			if (!User::checkFirstName($firstName))
				$errors[] = "Имя должно быть длиннее 4 символов.";

			if (!User::checkLastName($lastName))
				$errors[] = "Фамилия должна быть длиннее 3 символов.";

			if (!User::checkPassword($password))
				$errors[] = "Пароль не может быть короче 6-ти символов.";

			if (!User::checkCity($city))
				$errors[] = "Введите Ваш город!";

			if (!User::checkPostal($postal))
				$errors[] = "Укажите отделение Новой Почты!";

                    // if (!User::checkEmailExists($email))
                    //     $errors[] = "Этот e-mail уже используется.";

                    // if (!User::checkPhoneExists($phone))
                    //     $errors[] = "Этот номер уже используется.";

        if ($errors == false) {
            $res = User::editUserInfo($userId, $firstName, $lastName, $email, $phone, $password, $city, $postal);
        }

        }
            require_once ROOT . '/views/cabinet/edit.php';
            return true;
    }

    public function actionOrdersHistory()
    {
        //Получаем инфу о юзере из сессии
        $userId = User::checkLog();
       // $userInfo = User::getUserById($userId);
        $orders = false;

        $orders = Order::getOrderByUserId($userId);
        
        require_once ROOT . '/views/cabinet/ordersHistory.php';
        return true;
    }

}