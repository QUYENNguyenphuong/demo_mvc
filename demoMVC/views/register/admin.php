<label> Admin Page </label>
<br>
<?php foreach ($items as $item): ?>
    <?php if(isset($item->level) && $item->level == 'admin'): ?>
        <?php if (isset($_SESSION["logged"]) && ($_SESSION["logged"] == true)): ?>
            <p>YOUR INFORMATION</p>
            <p>Level:<?= $item->level ?></p>
            <p>Email:<?= $item->email?></p>
            <?php
            if (isset($_GET['change_pass']) and $_GET['change_pass'] == 'success') {
                $msg = "Your Password is updated Successfully.";
                echo '<p>' . $msg . '</p>';
            }
            ?>
            <a href="index.php?controller=register&action=pre_change_pass"> Change password </a>
            <br>
            <a href="index.php?controller=posts&action=index"> Posts</a>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>
<br>
<a href="index.php?controller=register&action=index"> index </a>