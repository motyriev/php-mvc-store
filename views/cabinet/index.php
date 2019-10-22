<?php
include (ROOT . '/views/parts/header.php');
?>
<section>
    <div class="container">
    <h2>Личный кабинет</h2>
        <h4 id="cabinet_greeting">Здравствуйте, <?php echo $userInfo['last_name'] .' '. $userInfo['first_name'] ;?></h4>
        <ul id="cabinet_list">
           <li><a target="_blank" href="/cabinet/edit">Редактировать персональные данные</a></li>
           <li><a target="_blank" href="/cabinet/orders">Список покупок</a></li>
          <?php if($userInfo['role']=='admin'):?>
            <li><a target="_blank" href="/admin">Админка</a></li>
            <?php endif; ?>
        </ul>
    </div>
</section>
<div class="appendix"></div>
<?php
include (ROOT . '/views/parts/footer.php');
?>
