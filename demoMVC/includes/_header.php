<?php

if(isset( $_GET['id']))
{
    $id = (int) $_GET['id'];
    $sql = "SELECT title FROM posts WHERE Id = $id";
    $result = dbCon::arraySelect($sql);
    $pagename = $result[0]['title'];
    $title = $pagename;
}
else
{
    $title = "Demo_PHP_MVC";
}
?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>

