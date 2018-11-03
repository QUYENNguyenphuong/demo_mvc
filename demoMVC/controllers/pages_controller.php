<?php
/**
 * Created by PhpStorm.
 * User: Q
 * Date: 10/24/2018
 * Time: 1:09 PM
 */
require_once "controllers/base_controller.php";
class PageController extends BaseController
{
    /**
     * PageController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->folder = 'pages';
    }
    public function home()
    {
        $data = array(
            'name' => 'Billy',
            'age' => '15'
        );
        $this->render('home',$data);
    }
    public function error(){
        $this->render('error');
    }
}