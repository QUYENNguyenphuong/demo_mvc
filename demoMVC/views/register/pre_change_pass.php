<?php foreach ($items as $item)
echo '<form action="index.php?controller=register&action=user&username='.$item->username .'" method="post">';
echo  '<input type="text" name="oldpassword"  placeholder="Enter Your Old Password">';
echo '<br>';
echo ' <input type="text" name="newpassword" placeholder="Enter Your New Password">';
echo '<br>';
echo '<input type="text" name="confirmpassword" placeholder="Enter Confirm Password">';
echo '<br>';
echo '<input type="submit" value="Submit" name="btn_submit" >';
echo '</form>';
if(isset($this->msg)) {
    echo $this->msg;
    echo '<br>';
}
?>
<br>
<a href="index.php?controller=register"> index </a>