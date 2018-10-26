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
            require_once ('views/layouts/application.php');

            ob_start();
            require_once ("includes/_header.php");
            $buffer=ob_get_contents();
            ob_end_clean();

            $title = "";
            $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);


        }
        else
        {
            header('Location:index.php?controller=pages&action=error');
        }
    }
}