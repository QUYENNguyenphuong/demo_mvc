<p>Page User</p>
<?php
//session_start();
if(isset($_GET['login']) and  ($_GET['login']== 'success'))
{
    $msg = 'User '.$_GET['username'].' login successful ';
    echo '<p>'.$msg.'</p>';
}
if(isset($_GET['change_pass']) and  $_GET['change_pass']== 'success')
{
    $msg = "Your Password is updated Successfully.";
    echo '<p>'.$msg.'</p>';
}
?>
<?php foreach ($items as $item): ?>
<a href="index.php?controller=register&action=pre_change_pass&username=<?= $item->username ?>"> Change password </a>
<br>
<a href="index.php?controller=register&action=index"> index </a>
<?php endforeach; ?>
