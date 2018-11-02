<?php foreach ($items as $item): ?>
<form action="index.php?controller=register&action=user&username=<?php echo $item->username ?>" method="post">
<input type="text" name="oldpassword"  placeholder="Enter Your Old Password">
<br>
<input type="text" name="newpassword" placeholder="Enter Your New Password">
<br>
<input type="text" name="confirmpassword" placeholder="Enter Confirm Password">
<br>
<input type="submit" value="Submit" name="btn_submit" >
</form>
<?php endforeach; ?>
<?php
if(isset($this->msg)) {
    echo $this->msg;
    echo '<br>';
}
?>
<br>
<a href="index.php?controller=register"> index </a>