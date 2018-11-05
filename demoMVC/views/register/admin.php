<label> Admin Page </label>
<?php
foreach ($items as $item) {
    if (isset($_GET['login']) && ($_GET['login'] == 'success') && $_SESSION['name'] == $item->username) {
        $msg = 'Admin ' . $_SESSION['name'] . ' login successful';
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
?>
<br>
<a href="index.php?controller=posts&action=index"> Post </a>
<br>
<a href="index.php?controller=register&action=index"> index </a>