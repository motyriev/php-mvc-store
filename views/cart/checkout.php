<?php
include (ROOT . '/views/parts/header.php');
?>
<section id="cart_section">
    <div class="container">
        <!--main content-->
        <div class="content">
            <h2>Корзина</h2>

            <?php if ($res): ?>
                <p>Заказ оформлен. Мы Вам перезвоним.</p>
            <?php else: ?>

            <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?> грн</p><br/>

            <?php if (!$res): ?>

            <?php if (isset($errors) && is_array($errors)):?>
                <ul class="errors" id="error_checkout">
                    <?php foreach($errors as $error):?>
                        <li> - <?php echo $error;?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
            <form action="#" method="post" id="checkout_form">
                <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>
                <input required type="text" name="name" placeholder="Введите имя" value="<?php echo $user['first_name']." ".$user['last_name'];?>">
                <input required type="tel" name="tel" value = <?php echo $user['phone']?> pattern="0([0-9]{2})([0-9]{7})" placeholder="Телефон в формате: 0(xx)-xxx-xx-xx">
                <select name = "postoffice_id">
                    <?php $postoffice = PostOffice::getPostById($user['postoffice_id'])?>
                    <option value = <?php echo $user['postoffice_id'] ?>> <? echo $postoffice['name'] ?>  </option>
                    <?php foreach ($postoffices as $fostoffice): ?>
                    <option value = <?php echo $fostoffice['id'] ?>> <? echo $fostoffice['name'] ?>  </option>
					<?php endforeach; ?>
                </select>
                <textarea name="comment" placeholder="Комментарий к заказу"></textarea>
                <input type=submit name="submit" value="Оформить заказ" id="check_btn">
            </form>
            <?php endif;?>

            <?php endif;?>
        </div>
    </div>
</section>
<div class="appendix"></div>
<?php
include (ROOT . '/views/parts/footer.php');
?>
