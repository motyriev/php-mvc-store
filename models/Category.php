<?php
/**
 * Модель для работы с каталогом
 */
class Category
{
    /**
    * @return array список категорий
    */
    public static function getCategories () {
        $db = Db::getConnect();
        $arr_cat = [];
        $sql = "SELECT * FROM categories";

        $res = $db->query($sql);

        while ($row = $res->fetch(PDO::FETCH_ASSOC))
        {
            $arr_cat[$row['id']] = $row;
        }
        return $arr_cat;
    }
    public static function getCategoryByAlias($catAlias) {

        $db = Db::getConnect();

        $sql = "
               SELECT * FROM categories
                    WHERE alias = :alias
               ";

        $res = $db->prepare($sql);
        $res->bindParam(':alias', $catAlias, PDO::PARAM_STR);
        $res->execute();

        $category = $res->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

     /**
     * Список категорий для админпанели
     * Возвращает массив всех категорий, включая те, у которых статус отображения = 0
     * @return array
     */
    public static function getCategoryListAdmin () {
        $db = Db::getConnect();

        $sql = "SELECT uriName, name FROM categories";

        $res = $db->query($sql);

        $catList = $res->fetchAll(PDO::FETCH_ASSOC);

        return $catList;
    }

    public static function addCategory($options){

        $db = Db::getConnect();

        $sql = "INSERT INTO categories(uriName, name)
                VALUES(:uriName, :name)";

        $res = $db->prepare($sql);

        $res -> bindParam(':uriName', $options['id'], PDO::PARAM_STR);
        $res -> bindParam(':name', $options['name'], PDO::PARAM_STR);

        return $res->execute();
    }

    public static function deleteCategoryById($id){
        $db = Db::getConnect();

        $sql = "DELETE FROM categories WHERE uriName = :id";

        $res = $db->prepare($sql);
        $res -> bindParam(':id', $id, PDO::PARAM_STR);
        return $res->execute();
    }
}