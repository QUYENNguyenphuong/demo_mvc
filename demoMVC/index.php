<?php
/**
 * Created by PhpStorm.
 * User: Q
 * Date: 10/24/2018
 * Time: 9:24 AM
 */

require_once ('dbCon.php');

if(isset($_GET['controller']))
{
    $controller = $_GET['controller'];
    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = 'index';
    }
}
else
{
    $controller = 'pages';
    $action = 'home';
}
require_once ('routes.php');