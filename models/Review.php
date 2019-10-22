<?php
// Класс для работы с комментариями
class Review{


   public static function createReview($userId, $productId, $text){
       $conn = Db::getConnect();
       $sql = "
                INSERT INTO review(user_id, product_id, text)
                VALUES(:userId, :productId, :text)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        
		return $stmt->execute();
   }

   public static function checkText($text){
    if (strlen($text) < 255 and strlen($text) >= 3)
        return true;
    return false;
   }

   public static function getReviewListByProductId ($productId) {
    $db = Db::getConnect();
    $sql = "SELECT id, product_id, user_id, text, date FROM review 
              WHERE product_id = :productId 
            ";
    $res = $db->prepare($sql);
    $res->bindParam(':productId', $productId, PDO::PARAM_STR);

    $res->execute();
    $reviews = $res->fetchAll(PDO::FETCH_ASSOC);
    return $reviews;
   }

    public static function getTopReviewListByProductId ($productId) {
        $db = Db::getConnect();
        $sql = "SELECT id, product_id, user_id, text, date FROM review
                  WHERE product_id = :productId order by date desc limit 3
                ";
        $res = $db->prepare($sql);
        $res->bindParam(':productId', $productId, PDO::PARAM_STR);
    
        $res->execute();
        $reviews = $res->fetchAll(PDO::FETCH_ASSOC);
        return $reviews;
}


}