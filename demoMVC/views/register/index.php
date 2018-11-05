<?php
if(isset($this->msg)){
    echo $this->msg;
    echo '<br>';
}
if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true)
{
    foreach ($items as $item)
    {
        if(isset($item->level)) {
            echo '<a href="index.php?controller=register&action='.$item->level.'&username=' . $_SESSION['name'] . '&login=success"> Your information</a>';
            echo '<br>';
        }
        else
            header('Location:index.php?controller=pages&action=error');
    }
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
