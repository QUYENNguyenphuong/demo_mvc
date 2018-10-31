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
   public static function  prepare_edit($id)
   {
       $sql = "SELECT title, content, Id FROM posts WHERE Id = $id";
       $items = dbCon::arraySelect($sql);
       foreach ($items as $item)
       {
           $item = new Posts($item['Id'],$item['title'], $item['content']);
       }
       return $item;
   }
   public static function edit( int $id,$title, $content)
   {
       $sql = "UPDATE posts SET title = '$title' , content = '$content' WHERE Id = $id ";
       $k = dbCon::queryExecute($sql);
       return $k;
   }

   public static function insert($title, $content)
   {
       $sql = "INSERT INTO posts(title, content) VALUES ('$title', '$content')";
       $result = dbCon::queryExecute($sql);
        return $result;
   }
   public static function delete($id)
   {
       $sql = "DELETE FROM posts WHERE Id = $id ";
       $result = dbCon::queryExecute($sql);
       return $result;
   }
}