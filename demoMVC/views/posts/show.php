
<?php
  echo "Tilte: $post->title";
  echo "</br>";
  echo "Content: $post->content";
  echo "</br>";
  echo '<a href="index.php?controller=posts&action=prepare_edit&id='.$post->id.'" > Edit </a>'
?>
