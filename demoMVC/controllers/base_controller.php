<?php
/**
 * Created by PhpStorm.
 * User: Q
 * Date: 10/24/2018
 * Time: 10:05 AM
 */

class BaseController
{
    public  $folder;

    public function __construct()
    {
        session_start();
    }

    function render($file, $data = array())
    {
        $view_file = 'views/'. $this->folder . '/' . $file . '.php';
        if(is_file($view_file))
        {
            extract($data);
            ob_start();
            require_once ($view_file);
            $content = ob_get_clean();

//            echo "Render"; die($content);
            // title
            if($view_file == 'views/posts/show.php')
            {
                $item = Posts::find($_GET['id']);
                $title = $item->title;
            }
            else {
                $title = "Demo_PHP_MVC";
            }
            //status of login
                    if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true)
                    {
                        if (isset($_SESSION['name'])) {
                            $status = 'WELCOME, ' . $_SESSION['name'];
                        }
                    }
                    else
                    {
                        $status = 'Guest';
                    }

                    if(isset($_SESSION["logged"]) && $_SESSION["logged"] == false)
                    {
                        unset($_SESSION['name']);
                        $status = 'Guest';
                        session_destroy();
                    }


          require_once ('views/layouts/application.php');
        }
        else
        {
            header('Location:index.php?controller=pages&action=error');
        }
    }
}