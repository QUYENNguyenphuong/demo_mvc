<?php
/**
 * Created by PhpStorm.
 * User: Q
 * Date: 10/24/2018
 * Time: 11:38 AM
 */
include_once "dbCon.php";
class Posts
{
    public  $id;
    public  $title;
    public  $content;

    /**
     * Posts constructor.
     * @param $id
     * @param $title
     * @param $content
     */
    public function __construct($id, $title, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }


   public static function get_data()
   {
       $sql = 'SELECT * FROM posts';
       $query = dbCon::arraySelect($sql);
       $list = [];
       foreach ($query as $item) {
           $list[] = new Posts($item['Id'], $item['title'], $item['content']);
       }
       return $list;

   }
   public static function find($id)
   {
       $sql = "SELECT * FROM posts WHERE Id = $id";
       $items = dbCon::arraySelect($sql);
       foreach ($items as $item) {
           $kq = new Posts($item['Id'], $item['title'], $item['content']);
       }
       return $kq;
   }
}