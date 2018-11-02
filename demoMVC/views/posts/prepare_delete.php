<form method="post" action="index.php?controller=posts&action=show&id=<?php $item_delete->id ?>">
    <label>Title:   </label>
    <input name="title" type="text" value="<?= $item_delete->title ?>">
    </br>
    <label>Content: </label>
    <textarea name="content" rows="10" cols="50" class="content" type="text" > <?= $item_delete->content ?> </textarea>
    </br>
    <input type="submit" name="btn_delete" value="Delete">
</form>
