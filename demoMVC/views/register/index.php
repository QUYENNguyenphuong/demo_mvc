<?php
if(isset($this->msg)){
    echo $this->msg;
    echo '<br>';
}
?>
<a href="index.php?controller=register&action=sign_up"> Sign up </a>
<br>
<a href="index.php?controller=register&action=login"> Login </a>
<br>
<a href="index.php?controller=register&action=logout"> Logout </a>
<br>
<br>
Go to Post page <a href="index.php?controller=posts"> Post </a>
