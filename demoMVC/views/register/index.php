<?php
if(isset($this->msg)) {
    echo $this->msg;
    echo '<br>';
}
?>
<?php if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true): ?>
    <?php foreach ($items as $item): ?>
        <?php if(isset($item->level)): ?>
            <a href="index.php?controller=register&action=<?= $item->level ?>"> Your information</a>
            <br>
            <a href="index.php?controller=register&action=logout"> Logout </a>
            <br>
            Go to Post page:  <a href="index.php?controller=posts"> Post </a>
            <br>
            Go to Home page: <a href="index.php?controller=pages&action=home"> Home page </a>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
<?php if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == false): ?>
    <a href="index.php?controller=register&action=sign_up"> Sign up </a>
    <br>
    <a href="index.php?controller=register&action=login"> Login </a>
    <br>
    Go to Post page: <a href="index.php?controller=posts"> Post </a>
    <br>
    Go to Home page: <a href="index.php?controller=pages&action=home"> Home page </a>
<?php endif; ?>