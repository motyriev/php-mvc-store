<?php
/**
 * Модель для работы с каталогом
 */
class Category
{
    /**
    * @return array список категорий
    */
    public static function getCategory () {
        $db = Db::getConnect();

        $sql = "SELECT * FROM categorys";

        $res = $db->query($sql);

        $catList = $res->fetchAll(PDO::FETCH_ASSOC);

        return $catList;
    }

     /**
     * Список категорий для админпанели
     * Возвращает массив всех категорий, включая те, у которых статус отображения = 0
     * @return array
     */
    public static function getCategoryListAdmin () {
        $db = Db::getConnect();

        $sql = "SELECT uriName, name FROM categorys";

        $res = $db->query($sql);

        $catList = $res->fetchAll(PDO::FETCH_ASSOC);

        return $catList;
    }

    public static function addCategory($options){

        $db = Db::getConnect();

        $sql = "INSERT INTO categorys(uriName, name)
                VALUES(:uriName, :name)";

        $res = $db->prepare($sql);

        $res -> bindParam(':uriName', $options['id'], PDO::PARAM_STR);
        $res -> bindParam(':name', $options['name'], PDO::PARAM_STR);

        return $res->execute();
    }

    public static function deleteCategoryById($id){
        $db = Db::getConnect();

        $sql = "DELETE FROM categorys WHERE uriName = :id";

        $res = $db->prepare($sql);
        $res -> bindParam(':id', $id, PDO::PARAM_STR);
        return $res->execute();
    }
}