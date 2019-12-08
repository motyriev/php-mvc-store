<?php
include (ROOT . '/widgets/menu/menu.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Hi-tech Shop</title>
    <link href="<?php ROOT?>/template/css/normalize.css" rel="stylesheet">
    <link href="<?php ROOT?>/template/css/main.css" rel="stylesheet">
    <link href="<?php ROOT?>/template/megamenu/css/style.css" rel="stylesheet">
    <link href="<?php ROOT?>/template/css/ion.tabs.css" rel="stylesheet">
    <link href="<?php ROOT?>/template/css/ion.tabs.skinBordered.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <script src="<?php ROOT?>/template/js/jquery.js"></script>
    <script src="<?php ROOT?>/template/js/main.js"></script>
    <script src="<?php ROOT?>/template/megamenu/js/megamenu.js"></script>
    <script src="<?php ROOT?>/template/js/ion.tabs.js"></script>
</head>
<body>
<div class="wrapper">
    <header id="header">
        <div class="top_nav" id="myTopnav">
        <div class="logo">
            <a href="/"><img alt="" src="<?php ROOT?>/template/images/logo.png"/></a>
        </div>
        <div class="main">
            <div class="area_top">
                <ul>
                    <li><a href="/" >О МАГАЗИНЕ</a></li>
                    <li><a href="/" >ДОСТАВКА И ОПЛАТА</a></li>
                    <li><a href="/" >КОНТАКТЫ</a></li>
                    <li><a href="/" >ОТЗЫВЫ</a></li>
                </ul>
            </div>
        </div>
        <div class="work">
        </div>
        <div class="phones">
            <a name="phone1" href="tel:+380960000001">
                <img src="/pics/operators/kyivstar.jpg" alt="kyivstar">
                    (096) 000 00 01</a>
            <a name="phone1" href="tel:+380960000002">
                <img src="/pics/operators/mts.jpg" alt="mts">
                    (066) 000 00 02</a>
            <a name="phone1" href="tel:+380960000003">
                <img src="/pics/operators/lifecell.jpg" alt="lifecell">
                    (093) 000 00 03</a>
        </div>
        <?php if(User::isGuest()):?>
        <div class="cart">
            <a href="/cart"><img src="/template/images/cart.png" width="60" height="60"></a>
                    Корзина(<span class="cart_count"><?php echo Cart::itemsCount();?></span>)
        </div>
        <div class="cab">
            <img src="/template/images/user.png" width="60" height="60" alt="user">
            <a href="/user/register">Войти в личный Кабинет</a>
        </div>
        <?php else:?>
            <li><a href="/cart ">
                    Корзина
                    (<span class="cart_count"><?php echo Cart::itemsCount();?></span>)
                </a></li>
            <li><a href="/cabinet">Личный кабинет</a></li>
            <li><a href="/user/logout">Выход</a></li>
        <?php endif;?>
            </div>
            <!-- <div class="search">
                <input type="search" name="search" id="search">
                    <ul id="here"></ul>
            </div> -->
        <div class="header_bottom">
                <div class="menu-container">
                    <div class="menu">
                        <ul>
                            <?php new menu([]);?>
                        </ul>
                    </div>
                </div>
        </div>
    </header>