<?php
if(isset($this->msg)){
    echo $this->msg;
    echo '<br>';
}
foreach ($items as $item) {
    echo '<a href="index.php?controller=register&action=pre_change_pass&username=' . $item->username . '"> Change password </a>';
    echo '<br>';
}
?>
<br>
<a href="index.php?controller=register"> index </a>