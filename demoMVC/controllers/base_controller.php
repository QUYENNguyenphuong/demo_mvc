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

    function render($file, $data = array())
    {
        $view_file = 'views/'. $this->folder . '/' . $file . '.php';
        if(is_file($view_file))
        {
            extract($data);
            ob_start();
            require_once ($view_file);
            $content = ob_get_clean();
            if($view_file == 'views/posts/show.php')
            {
                $item = Posts::find($_GET['id']);
                $title = $item->title;
            }
            else
            {
                $title = "Demo_PHP_MVC";
            }
            require_once ('views/layouts/application.php');
        }
        else
        {
            header('Location:index.php?controller=pages&action=error');
        }
    }

}