<label> Admin Page </label>
<?php
if(isset($_GET['login']) and  ($_GET['login']== 'success'))
{
    $msg = 'Admin '.$_SESSION['name'].' login successful';
    echo '<p>'.$msg.'</p>';
    echo '<p>YOUR INFORMATION</p>';
    foreach ($items as $item)
    {
        echo '<p>Level: '.$item->level .' </p>';
        echo '<p>Email: '.$item->email .' </p>';
    }
}
?>
<br>
<a href="index.php?controller=posts&action=index"> Post </a>
<br>
<a href="index.php?controller=register&action=index"> index </a>