<label> LOGIN </label>
<form action="index.php?controller=register&action=login" method="post">
    <label>User name: </label>
    <input type="text" name="username" size="40">
    <br>
    <label>Password: </label>
    <input type="password" name="password" size="40">
    <br>
    <input type="submit" value="Login" name="btn_login">
</form>
<br>
<?php
if(isset($this->msg)){
    echo $this->msg;
    echo '<br>';
}
