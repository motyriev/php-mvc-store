<?php foreach($products as $product):?>
                    <div class="item">
                    <a href="/product/<?php echo $product['alias']?>">
                            <img alt="" width="268px" height="249px" src="<?php echo Product::getImage($product['alias']); ?>"/>
                        </a>
                        <p class="item_price"><?php echo $product['price']?>&nbspгрн</p>
                        <a href="/product/<?php echo $product['alias']?>">
                            <p class="item_name"><?php echo $product['name']?></p>
                        </a>
                        <a href="#" class="to_cart" data-id="<?php echo $product['alias'];?>">
                            Купить
                        </a>
                    </div>
<?php endforeach;?>