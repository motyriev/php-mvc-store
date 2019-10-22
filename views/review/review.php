<?php
include (ROOT . '/views/parts/header.php');
?>
<section>
    <div class="container">

    <form action="#" method="post" id="review_form">
        <h2>Оставить комментарий</h2>
        <input required type="text" name="text" placeholder="Текст комментария" value="<?php echo $text ?>">
        <input type=submit name="submit" value="Оставить комментарий" id="reg_btn">
    </firm>

    <div class="content">
        <div class = "comment">
            <h2>Комментарии к товару <?php echo $product['name']?></h2>
            <?php foreach($reviews as $review):?>
            <?php $user = User::getUserById($review['user_id'])?>
            <p class="name">Name: <?php echo $user['last_name']?></p>
            <p class="date">Date: <?php echo $review['date']?></p>
            <p class="text">Text: <?php echo $review['text']?></p>
            <?php endforeach;?>
        </div>
    </div>

    </div>
</section>