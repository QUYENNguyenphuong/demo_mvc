<?php
//include_once "controllers/posts_controller.php";
//$posts = new PostsController();
//$posts = $posts->index();
echo '<ul>';
foreach ($posts as $post)
{
    echo '<form action="index.php?controller=posts&action=index&id='.$post->id.'" method="post">';
    echo '<li value="'.$post->id .'">
               <a  href="index.php?controller=posts&action=show&id=' . $post->id . '">' . $post->title . '</a>
               <input name="btn_delete" value="delete" type="submit">
          </li>';
    echo '</form>';
}
echo '</ul>';echo '<a href="index.php?controller=posts&action=prepare_insert"> Insert </a>';

