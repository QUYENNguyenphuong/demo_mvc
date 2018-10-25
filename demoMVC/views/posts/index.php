<?php
//include_once "controllers/posts_controller.php";
//$posts = new PostsController();
//$posts = $posts->index();
echo '<ul>';
foreach ($posts as $post)
{
    echo '<li>
               <a href="index.php?controller=posts&action=show&id=' . $post->id . '">' . $post->title . '</a>
          </li>';
}
echo '</ul>';


