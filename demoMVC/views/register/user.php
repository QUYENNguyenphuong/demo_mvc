<p>Page User</p>
<?php foreach ($items as $item): ?>
    <?php if ($item->level == 'user' && isset($_SESSION["logged"]) && ($_SESSION["logged"] == true)) :?>
        <p>YOUR INFORMATION</p>
        <p>Level:<?= $item->level ?></p>
        <p>Email:<?= $item->email ?></p>
        <?php
        if(isset($_GET['change_pass']) and  $_GET['change_pass']== 'success')
        {
            $msg = "Your Password is updated Successfully.";
            echo '<p>'.$msg.'</p>';
        }
        ?>
        <a href="index.php?controller=register&action=pre_change_pass"> Change password </a>
    <?php endif; ?>
<?php endforeach; ?>
<br>
<a href="index.php?controller=register&action=index"> index </a>
