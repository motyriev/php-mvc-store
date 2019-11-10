<?php
include ROOT . '/views/parts/header.php';
?>
<section>
    <div class="container">
        <!--left sidebar-->
        <div class="sidebar">
            <h2>Каталог</h2>
            <ul class="left_sidebar">
                <?php foreach ($categories as $catItem):?>
                <li><a href="catalog/<?php echo $catItem['uriName']?>">
                    <?php echo $catItem['name']?>
                </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!--main content-->
        <div class="content">
            <div class="features_items">
                <h2>Последние товары</h2>
            </div>
        </div>
    </div>
</section>
<div class="appendix"></div>
<?php
include ROOT . '/views/parts/footer.php';
?>
