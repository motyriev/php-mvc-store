
<li>
<a href="<?= "/category/".$category['alias']?>"><span><img src="<?=$category['img']?>"/><?= $category['name']?></a></span></a>

        <?php if(isset($category['childs'])): ?>
            <ul>
                <? $this->getMenuHtml($category['childs']); ?>
            </ul>
        <?php endif;?>
</li>