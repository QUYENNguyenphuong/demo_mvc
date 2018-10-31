<?php
require_once "dbCon.php";
require_once "controllers/base_controller.php";
require_once "models/Member.php";
class RegisterController extends BaseController
{
    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->folder = 'register';
    }
    public function index()
    {
        $this->render('index');
    }
    function is_email($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    public function sign_up()
    {
        if(isset($_POST['btn_signup']))
        {
            $username = isset($_POST['username']) ? ($_POST['username']) : '';
            $password = isset($_POST['password']) ? ($_POST['password']) : '';
            $email = isset($_POST['email']) ? ($_POST['email']) : '';
            $level    = isset($_POST['level'])    ? (int)$_POST['level'] : '';
            if(!$username || !$password ||!$email || !$level)
            {
                $this->msg = "Please provide your informations!";
            }
            else {
                $check_name = Member::check_user($username);
                if ($check_name) {
                    $this->msg = "This username is already used. Please try another username";
                }
                elseif (!$this->is_email($email))
                {
                    $this->msg = "Invalid email";
                }
                else {
                    $item_insert = Member::add_member($username, $password,$email, $level);
                    if ($item_insert == true) {
                        $this->msg = "Sign up success!";
                        $this->render('index');
                    }
                }
            }
        }
        $this->render('sign_up');
    }
    public function  login()
    {
        if(isset($_POST['btn_login']))
        {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            //$level    = isset($_POST['level'])    ? $_POST['level'] : '';
            $admin_login = Member::check_admin($username);
            if(!$username || !$password)
            {
                $this->msg = "Please provide your informations !";
            }
            else {
                $user_login = Member::login($username, $password);
                if (!$user_login)
                {
                    $this->msg = "Login failed!  ";
                }
                else
                {
                    if($admin_login)
                    {
                        $_SESSION['username'] = $username;
                        $this->msg = "Hello admin $username  ";
                        $this->render('admin');
                    }
                    else
                    {
                        $_SESSION['username'] = $username;
                        $this->msg = "Hello $username";
                        $items = Member::get_data($username);
                        $data = array('items'=> $items);
                        $this->render('user', $data);
                    }
                }
            }
        }
        $this->render('login');
    }
    public function pre_change_pass()
    {
        $item = Member::find_user($_GET['username']);
        $data = array('item' => $item);
        $this->render('pre_change_pass', $data);
    }
    public function user()
    {
        if (isset($_POST['btn_submit']))
        {
            $username = $_GET['username'];
            $oldpassword = isset($_POST['oldpassword']) ? $_POST['oldpassword'] : '';
            $newpassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : '';
            $confirmpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';
            $check_pass = Member::check_password($username,$oldpassword);
            if(!$check_pass)
            {
                $this->msg = "Invalid password";
                $this->render('pre_change_pass');
            }
            elseif( $newpassword != $confirmpassword )
            {
                $this->msg = "Wrong confirm password!";
                $this->render('pre_change_pass');
            }
            else
            {
                $change_pass = Member::change_password($username,$newpassword);
                if($change_pass == true)
                {
                    $this->msg = "Your Password is updated Successfully.";
                    $items = Member::get_data($username);
                    $data = array('items'=> $items);
                    $this->render('user', $data);
                }
            }
        }
        $items = Member::find_user($_GET['username']);
        $data = array('items'=> $items);
        $this->render('user', $data);
    }
}
?>