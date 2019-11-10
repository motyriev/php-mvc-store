<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Hi-tech Shop</title>
    <link href="<?php ROOT?>/template/css/main.css" rel="stylesheet">
    <script src="<?php ROOT?>/template/js/jquery.js"></script>
    <script src="<?php ROOT?>/template/js/main.js"></script>
</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="header_middle">
            <a href="/" class="logo"><img alt="" src="<?php ROOT?>/template/images/logo.png"/></a>
            <ul class="header_middle_nav">
            <form action="search" method="post" autocomplete="off">
    <input type="search" name="search" id="search">
    <ul id="here">

    </ul>
    </form>
            <?php if(User::isGuest()):?>
            <li><a href="/cart">
                    Корзина
            (<span class="cart_count"><?php echo Cart::itemsCount();?></span>)
            </a></li>
            <li><a href="/user/register">Регистрация</a></li>
            <li><a href="/user/login">Вход</a></li>
        <?php else:?>
            <li><a href="/cart">
                    Корзина
                    (<span class="cart_count"><?php echo Cart::itemsCount();?></span>)
                </a></li>
            <li><a href="/cabinet">Личный кабинет</a></li>
            <li><a href="/user/logout">Выход</a></li>
        <?php endif;?>
            </ul>
        </div>
        <div class="header_bottom">
            <ul class="header_bottom_nav">
            <li><a href="/">Главная</a></li>

            <li><a href="/">Каталог</a></li>
            </ul>
        </div>
    </header>