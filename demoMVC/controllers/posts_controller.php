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
        return $data;
    }
    public function show()
    {
        $post = Posts::find($_GET['id']);
        $data = array('post' => $post);
        $this->render('show', $data);
    }
}