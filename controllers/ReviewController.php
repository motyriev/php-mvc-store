<?php
class ReviewController{
    public function actionView($productId){

        $userId = User::checkLog();

        $product = Product::getProductById($productId);
        $userInfo = User::getUserById($userId);

        $reviews = Review::getReviewListByProductId($productId);

        $text = '';
        $res = false;
		$errors = false;

        if (isset($_POST) and !empty($_POST)){
            $text = trim(strip_tags($_POST['text']));

            if (!Review::checkText($text))
                $errors[] = "Текст комментария должен быть длинее 3 и короче 255 символов.";

            if ($errors == false)
				$res = Review::createReview($userId, $productId, $text);

        }


        require_once ROOT . '/views/review/review.php';
        return true;
    }
}