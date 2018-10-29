<form method="post" action="index.php?controller=posts&action=insert">
    <input name="title" class="text" value="<?= $item_insert->title ?>">;
    <br>
    <input name="content" class="text" value="<?= $item_insert->content ?>">;
    <br>
    <input type="submit" value="INSERT" name="btn_insert">
</form>
