<?php
include (ROOT . '/views/parts/header.php');
?>
<section>
    <div class="container">
        <!--main content-->
        <ul class="breadcrumbs"><?= $breadcrumbs;?></ul>
        <div class="content">
            <div class="single_product">
                <div class="product_info">
                    <div class="single_product_img">
                        <img alt="" width="350px" src="<?php echo Product::getImage($product['id']); ?>" />
                    </div>
                    <div class="single_product_details">
                        <div class="single_product_details_main">
                            <h2><?php echo $product['name']?></h2>
                            <p class="code">Код товара: <?php echo $product['id']?></p>
                            <p class="item_price"><?php echo $product['price']?>&nbsp;грн</p>
                            <div id="input_div">
                                <a href="#" class="to_cart" data-id="<?php echo $product['id'];?>">
                                   Купить
                                </a>
                            </div>
                            <p><b>Наличие:</b> На складе</p>
                            <p><b>Состояние:</b> Новое</p>
                            <p><b>Производитель: </b><?php echo $product['brand']?></p>
                            <div class="ionTabs" id="tabs_1" data-name="Tabs_Group_name">
                            <ul class="ionTabs__head">
                                <li class="ionTabs__tab" data-target="Tab_desctiption">Описание</li>
                                <li class="ionTabs__tab" data-target="Tab_charact">Характеристики</li>
                                <li class="ionTabs__tab" data-target="Tab_review">Отзывы</li>
                            </ul>
                            <div class="ionTabs__body">
                                <div class="ionTabs__item" data-name="Tab_desctiption">
                                    Контент вкладки 1
                                </div>
                                <div class="ionTabs__item" data-name="Tab_charact">
                                    Контент вкладки 2
                                </div>
                                <div class="ionTabs__item" data-name="Tab_review">
                                    Контент вкладки 3
                                </div>

                                <div class="ionTabs__preloader"></div>
                            </div>
                        </div>
                    <div class = "product_review">
                    <h3>Отзывы покупателей <?=$qtyReviews?></h3>
                    <div id="input_div">
                        <?php foreach($reviews as $review):?>
                        <?php $user = User::getUserById($review['user_id'])?>
                        <p class="name">Name: <?php echo $user['first_name']?></p>
                        <p class="date">Date: <?php echo $review['date']?></p>
                        <p class="text">Text: <?php echo $review['text']?></p>
                        <?php endforeach;?>
                        <a href="/reviews/<?php echo $product['alias'];?>">
                             Смотреть все отзывы
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="appendix"></div>
<?php
include (ROOT . '/views/parts/footer.php');
?>
