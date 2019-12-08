<?php foreach($this->groups as $group_id => $group_item):?>
    <section class="filter-form">
            <h3><?=$group_item;?></h3>
                <?php foreach($this->attrs[$group_id] as $attr_id => $value):?>
                    <label class="checkbox">
                        <input type="checkbox" name="checkbox" value="<?=$attr_id?>"><?=$value?>
                    </label>
                <?php endforeach;?>
    </section>
<?php endforeach;?>