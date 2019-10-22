<?php
include (ROOT . "/views/parts/header.php");
?>
<section>
    <div class="container">
		<?php if ($res): ?>
            <h5 id="reg_thanks">Ваша учётная запись создана!</h5>
            <h3 id="reg_main"><a href="/user/login" id="reg_main_a">Войти в аккаунт</a></h3>
		<?php else: ?>
			<?php if (isset($errors) && is_array($errors)): ?>
                <ul class="errors">
					<?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
					<?php endforeach; ?>
                </ul>
			<?php endif; ?>
            <form action="#" method="post" id="registration_form">
                <h2>Быстрая регистрация</h2>
                <p>Основная информация</p>
                <input required type="text" name="first_name" placeholder="Ваше имя" value="<?php echo $firstName ?>">
                <input required type="text" name="last_name" placeholder="Ваша фамилию" value="<?php echo $lastName ?>">
                <input required type="email" name="email" placeholder="Эл. почта" value="<?php echo $email ?>">
                <input required type="text" name="phone" placeholder="Телефон (0961234567)" value="<?php echo $phone ?>">
                <input required type="password" name="password" placeholder="Придумайте пароль"value="<?php echo $password ?>">
                <p>Адрес доставки</p>
                <input required type="text" name="city" placeholder="Город" value="<?php echo $city ?>">
                <input required type="text" name="postal" placeholder="Отделение Новой Почты" value="<?php echo $postal ?>">

                <input type=submit name="submit" value="Регистрация" id="reg_btn">
                <p>Если Вы уже зарегистрированы, перейдите на страницу <a href = "/user/login">входа в систему.</a></p>
            </form>
		<?php endif; ?>
    </div>
</section>
<div class="appendix"></div>
<?php
include (ROOT . '/views/parts/footer.php');
?>
