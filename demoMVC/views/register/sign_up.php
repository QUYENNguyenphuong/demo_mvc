<label> SIGN UP </label>
<form action="index.php?controller=register&action=sign_up" method="post">
    <label>User name: </label>
    <input type="text" name="username" size="40">
    <br>
    <label>Password: </label>
    <input type="password" name="password" size="40">
    <br>
    <label>Email: </label>
    <input type="text" name="email" size="40">
    <br>
    <label>Level: </label>
    <select name="level">
        <option  value="user" > User </option>
        <option value="admin"> Admin</option>
    </select>
    <br>
    <input type="submit" value="Sign up" name="btn_signup">
</form>
<br>
<?php
if(isset($this->msg)){
    echo $this->msg;
    echo '<br>';
}
?>
<br>
Already have an account? <a href="index.php?controller=register&action=login"> Login </a>
<br>
<a href="index.php?controller=register"> index </a>