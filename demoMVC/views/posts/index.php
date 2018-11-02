<ul>
<?php  foreach ($posts as $post): ?>
    <form action="index.php?controller=posts&action=index&id=<?php echo $post->id ?>" method="post">
    <li value="<?php echo $post->id ?>">
    <a  href="index.php?controller=posts&action=show&id=<?php echo $post->id ?>"><?php echo $post->title  ?></a>
    <input name="btn_delete" value="delete" type="submit">
    </li>
    </form>
<?php endforeach; ?>
</ul>
<a href="index.php?controller=posts&action=prepare_insert"> Insert </a>
<br>
Go to register page:  <a href="index.php?controller=register"> Register </a>
