<?php
echo '<p>Page User</p>';
if(isset($_GET['action']) and  $_GET['action']== 'user')
{
    echo '<p> Update Successfully</p>';
}
foreach ($items as $item) {
    echo '<a href="index.php?controller=register&action=pre_change_pass&username=' . $item->username . '"> Change password </a>';
}
echo '<br>';
echo '<a href="index.php?controller=register"> index </a>';