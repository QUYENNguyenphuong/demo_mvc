
<?php
echo '<a href="index.php?controller=register&action=sign_up"> Sign up </a>';
echo '<br>';
echo '<a href="index.php?controller=register&action=login"> Login </a>';
echo '<br>';

if(isset($this->msg)){
    echo $this->msg;
    echo '<br>';
}
?>
<br>
Go to Post page <a href="index.php?controller=posts"> Post </a>
