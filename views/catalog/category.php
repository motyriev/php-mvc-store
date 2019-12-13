<?php
include (ROOT . '/views/parts/header.php');
?>
<section>
    <div class="container">
        <ul class="breadcrumbs"><?= $breadcrumbs;?></ul>
        <div class="filter"><?php new Filter ?></div>
        <div id="product_list_block">
            <h1><?=$category['name']?></h1>
            <form class="user_settings">
                <div class="user_sort">
                    <label for="user_pref">Сортировка по:</label>
                    <select id="user_pref" name="user_pref">
                        <option value="popular" selected="">Популярности</option>
                        <option value="newest">Новинкам</option>
                        <option value="price-asc">От дешевых к дорогим</option>
                        <option value="price-desc">От дорогих к дешевым</option>
                    </select>
                </div>
            </form>
            <div class="box_items">
                <!--single item-->
                <?php foreach($products as $product):?>
                    <div class="product-item">
                        <a href="/product/<?php echo $product['alias']?>">
                            <img alt="" width="268px" height="249px" src="<?php echo Product::getImage($product['alias']); ?>"/>
                        </a>
                        <div class="product-list">
                            <a href="/product/<?php echo $product['alias']?>">
                                <div class="product-name"><h3><?php echo $product['name']?></h3></div></a>
                            <span class="item_price">Цена: <?php echo $product['price']?>&nbspгрн</span>
                        <a href="#" class="to_cart" data-id="<?php echo $product['id'];?>">
                            Купить
                        </a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<div class="appendix"></div>
<?php
include (ROOT . '/views/parts/footer.php');
?>