<?php
include (ROOT . '/views/parts/header.php');
global $category;
?>
<section>
    <div class="container">
        <!--left sidebar-->
        <div class="sidebar">
            <h2>Категории</h2>
            <ul class="left_sidebar">
                <?php foreach ($categories as $catItem): ?>
                    <li><a href="/category/<?php echo $catItem['uriName']?>" class="<?php if($catUriName == $catItem['uriName']){
                        echo 'active';
                        $category = $catItem['name'];
                    }?>">
                            <?php echo $catItem['name']?>
                        </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!--main content-->
        <div class="content">
            <div class="features_items">
                <h2><?php echo $category;?></h2>
                <!--single item-->
                <?php foreach($products as $product):?>
                    <div class="item">
                    <a target="_blank" href="/product/<?php echo $product['id']?>">
                            <img alt="" width="268px" height="249px" src="<?php echo Product::getImage($product['id']); ?>" />
                        </a>
                        <p class="item_price"><?php echo $product['price']?>&nbspгрн</p>
                        <a target="_blank" href="/product/<?php echo $product['id']?>">
                            <p class="item_name"><?php echo $product['name']?></p>
                        </a>
                        <a href="#" class="to_cart" data-id="<?php echo $product['id'];?>">
                            Купить
                        </a>
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