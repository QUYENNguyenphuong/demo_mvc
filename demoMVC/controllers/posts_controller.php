<?php
/**
 * Created by PhpStorm.
 * User: Q
 * Date: 10/24/2018
 * Time: 1:10 PM
 */
require_once ('dbCon.php');
require_once('controllers/base_controller.php');
require_once('models/Posts.php');
class PostsController extends BaseController
{
    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        $this->folder = 'posts';
    }
    public function index()
    {
        $posts = Posts::get_data();
      $data = array('posts'=> $posts );
        $this->render('index', $data);
    }
    public function show()
    {
        if(isset($_POST['btn_edit'])) {
            $id = isset($_GET['id']);
            $title = isset($_POST['title']) ? ($_POST['title']) : 'hiihh';
            $content = isset($_POST['content']) ? ($_POST['content']) : 'hahaha';
            $k =  Posts::edit($_GET['id'],$title,$content);
        }
        $post = Posts::find($_GET['id']);
        $data = array('post' => $post);
        $this->render('show', $data);

    }
    public function prepare_edit()
    {
        $item = Posts::find($_GET['id']);
        $data = array('item' => $item);
        $this->render('prepare_edit', $data);
        if(isset($_POST['btn_edit']))
        {
            $title   = isset($_POST['title']) ? ($_POST['title']) : '';
            $content = isset($_POST['content']) ? ($_POST['content']) : '';
            $k =  Posts::edit((int) $_GET['id'],$title,$content);
            if( $k == true)
            {
                return true;
            }
        }
    }
}