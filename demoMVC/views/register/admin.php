<label> Admin Page </label>
<?php
if(isset($_GET['login']) and  ($_GET['login']== 'success'))
{
    $msg = "Admin login successfully";
    echo '<p>'.$msg.'</p>';
}
?>
<br>
<a href="index.php?controller=posts&action=index"> Post </a>
<br>
<a href="index.php?controller=register"> index </a>