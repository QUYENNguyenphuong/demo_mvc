<p>Page User</p>
<?php
//session_start();
foreach ($items as $item) {
    if (isset($_GET['login']) &&  ($_GET['login'] == 'success') && $_SESSION['name'] == $item->username ) {
        $msg = 'User ' . $_SESSION['name'] . ' login successful ';
        echo '<p>' . $msg . '</p>';
        echo '<p>YOUR INFORMATION</p>';
        echo '<p>Level: ' . $item->level . ' </p>';
        echo '<p>Email: ' . $item->email . ' </p>';
    }
    else
    {
        header('Location:index.php?controller=pages&action=error');
    }
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
