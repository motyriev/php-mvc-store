<?php
include (ROOT . '/views/parts/header.php');
?>
<section>
    <div class="container">
        <!--left sidebar-->
        <!-- <div class="sidebar">
            <h2>Категории</h2>
            <ul class="left_sidebar">
                <?php foreach ($categories as $catItem): ?>
                    <li><a href="/category/<?php echo $catItem['id']?>">
                            <?php echo $catItem['name']?>
                        </a></li>
                <?php endforeach; ?>
            </ul>
        </div>й -->
        <!--main content-->
        <p><?php echo $product['categoryName'];?></p>
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
                        </div>
                    </div>
                </div>
                <div class="product_description">
                    <h3>Описание товара</h3>
                    <p>
                        <?php echo $product['description']?>
                    </p>
                </div>
                    <div class = "product_review">
                    <h3>Комментарии</h3>
                    <div id="input_div">
                        <?php foreach($reviews as $review):?>
                        <?php $user = User::getUserById($review['user_id'])?>
                        <p class="name">Name: <?php echo $user['last_name']?></p>
                        <p class="date">Date: <?php echo $review['date']?></p>
                        <p class="text">Text: <?php echo $review['text']?></p>
                        <?php endforeach;?>
                        <a target="_blank" href="/review/<?php echo $product['id'];?>">
                             Все Комментарии
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
