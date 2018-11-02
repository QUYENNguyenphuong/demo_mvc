<p>Page User</p>
<?php
if(isset($_GET['action']) and  $_GET['action']== 'user')
{
    if(isset($_GET['msg'])){
        $msg = "Your Password is updated Successfully.";
        echo '<p>'.$msg.'</p>';
    }
}
?>
<?php
foreach ($items as $item) {
    echo '<a href="index.php?controller=register&action=pre_change_pass&username=' . $item->username . '"> Change password </a>';
}
?>
<br>
<a href="index.php?controller=register"> index </a>