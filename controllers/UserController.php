<?php
/**
 * Class UserController для работы с пользователем
 */
class UserController
{

	/**
	 * Регистрация пользователя
	 * @return bool
	 */
	public function actionRegister()
	{

		//Флаг ошибок
		$res = false;
		$errors = false;
		$firstName = '';
		$lastName = '';
		$email = '';
		$phone = '';
		$password = '';
		$city = '';
		$postal = '';

		if (isset($_POST) and !empty($_POST)) {
			//Удаляем теги, пробелы и сохраняем в переменные для проверки
			$firstName = trim(strip_tags($_POST['first_name']));
			$lastName = trim(strip_tags($_POST['last_name']));
			$email = trim(strip_tags($_POST['email']));
			$phone = trim(strip_tags($_POST['phone']));
			$password = trim(strip_tags($_POST['password']));
			$city = trim(strip_tags($_POST['city']));
			$postal = trim(strip_tags($_POST['postal']));

			//Валидация полей
			if (!User::checkFirstName($firstName))
				$errors[] = "Имя должно быть длиннее 4 символов.";

			if (!User::checkLastName($lastName))
				$errors[] = "Фамилия должна быть длиннее 3 символов.";

			if (!User::checkEmail($email))
				$errors[] = "E-mail адрес указан неверно.";

			if (!User::checkPhone($phone))
				$errors[] = "Введите Ваш телефон!";

			if (!User::checkPassword($password))
				$errors[] = "Пароль не может быть короче 6-ти символов.";

			if (!User::checkCity($city))
				$errors[] = "Введите Ваш город!";

			if (!User::checkPostal($postal))
				$errors[] = "Укажите отделение Новой Почты!";

				if (!User::checkEmailExists($email))
					$errors[] = "Этот e-mail уже используется.";
				if (!User::checkPhoneExists($phone))
					$errors[] = "Этот номер уже используется.";

			if ($errors == false)
				$res = User::register($firstName, $lastName, $email, $phone, password_hash($password, PASSWORD_DEFAULT), $city, $postal);
		}
		require_once ROOT . "/views/user/register.php";
		return true;
	}

	/**
	 * Авторизация пользователя
	 * @return bool
	 */
	public function actionLogin()
	{
		$login = '';
		$password = '';
		$errors = false;

		if (isset($_POST) and !empty($_POST)) {
			$login = trim(strip_tags($_POST['login']));
			$password = trim(strip_tags($_POST['password']));

			// Валидация поля
			if (!User::checkLoginType($login))
				$errors[] = "Введите e-mail или телефон";
			else{
				// Поиск юзера в БД
				$userId = User::checkUserData($login, $password);

				if (!$userId)
					$errors[] = 'Неверный логин / пароль';
				else{
					User::userIntoSession($userId);//запись юзера в сессию
					header("Location: /cabinet/");//перенаправляем в кабинет
				}
			}
		}
		require_once ROOT . '/views/user/login.php';
		return true;
	}

	/**
     * Выход из учетной записи
     * @return bool
     */
	public function actionLogout()
	{
		unset($_SESSION['user']);
        header("Location: /");
        return true;
	}
}?>