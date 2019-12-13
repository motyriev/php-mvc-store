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