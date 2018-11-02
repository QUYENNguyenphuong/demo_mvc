<label>Title: <?= $post->title ?>  </label>
</br>
<label>Content:  <?= $post->content ?> </label>
</br>
<a href="index.php?controller=posts&action=prepare_edit&id=<?= $post->id; ?>" > Edit </a>
<br>
<a href="index.php?controller=posts"> Post page </a>