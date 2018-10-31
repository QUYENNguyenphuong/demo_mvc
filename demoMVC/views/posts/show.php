<!---->
<?php
//  echo '<form action="index.php?controller=posts&action=index&id={$post->id}';
//  echo "Tilte: $post->title";
//  echo "</br>";
//  echo "Content: $post->content";
//  echo "</br>";
//  echo '<a href="index.php?controller=posts&action=prepare_edit&id='.$post->id.'" > Edit </a>';
//  echo '</br>';
//  echo '<input name="btn_delete" value="DELETE" type="submit" >';
//
//?>

<label>Title: <?= $post->title ?>  </label>
</br>
<label>Content:  <?= $post->content ?> </label>
</br>
<a href="index.php?controller=posts&action=prepare_edit&id=<?= $post->id; ?>" > Edit </a>
<br>
<a href="index.php?controller=posts&action=prepare_insert"> Post page </a>