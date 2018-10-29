
    <form method="post" action="index.php?controller=posts&action=show&id=<?= $item-> id ?>">
        <label>Title: </label>
        <input name="title" type="text" value="<?= $item->title ?>">
    </br>
        <label>Content: </label>
        <textarea name="content" rows="10" cols="50" class="content" type="text" > <?= $item->content ?> </textarea>
    </br>
    <input type="submit" name="btn_edit" value="EDIT">
    </form>
