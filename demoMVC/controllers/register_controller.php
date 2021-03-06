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
        parent::__construct();
        $this->folder = 'register';
    }
    public function index()
    {
        if (isset($_SESSION['name'])) {
            $items = Member::get_data($_SESSION['name']);
            $data = array('items' => $items);
            $this->render('index', $data);
            return;
        }
        else
            $this->render('index');
    }
    function is_email($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? false : true;
    }
    public function sign_up()
    {
        if(!isset($_SESSION["logged"]) || $_SESSION["logged"]== false )
        {
            if (isset($_POST['btn_signup']))
            {
                $username = isset($_POST['username']) ? ($_POST['username']) : '';
                $password = isset($_POST['password']) ? ($_POST['password']) : '';
                $email = isset($_POST['email']) ? ($_POST['email']) : '';
                $level = isset($_POST['level']) ? $_POST['level'] : '';
                if (!$username || !$password || !$email || !$level)
                {
                    $this->msg = "Please provide your informations!";
                }
                else
                {
                    $check_name = Member::check_user($username);
                    if ($check_name)
                    {
                        $this->msg = "This username is already used. Please try another username";
                    } elseif (!$this->is_email($email))
                    {
                        $this->msg = "Invalid email";
                    } else
                        {
                        $item_insert = Member::add_member($username, $password, $email, $level);
                        if ($item_insert == true)
                        {
                            $this->msg = "Sign up success!";
                            $this->render('index');
                            return;
                        }
                    }
                }
            }
            $this->render('sign_up');
            return;
        }
        elseif(Member::check_admin($_SESSION['name']))
        {
            header('Location:index.php?controller=register&action=admin');
        }
        else
            header('Location:index.php?controller=register&action=user');

    }
    public function  login()
    {
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false) {
            if (isset($_POST['btn_login']))
            {
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                if (!$username || !$password)
                {
                    $this->msg = "Please provide your informations !";
                }
                else
                {
                    $user_login = Member::login($username, $password);
                    if (!$user_login)
                    {
                        $this->msg = "Login failed! ";
                    } else
                        {
                        $_SESSION['name'] = $username;
                        $_SESSION["logged"] = true;
                        $admin_login = Member::check_admin($_SESSION['name']);
                        if ($admin_login)
                        {
                            $items = Member::get_data($_SESSION['name']);
                            $data = array('items' => $items);
                            header('Location:index.php?controller=register&action=admin');
                        } else
                            {
                            $items = Member::get_data($_SESSION['name']);
                            $data = array('items' => $items);
                            header('Location:index.php?controller=register&action=user');
                            }
                        }
                }
            }
            $this->render('login');
        }
        elseif(Member::check_admin($_SESSION['name']))
        {
            header('Location:index.php?controller=register&action=admin');
        }
        else
            header('Location:index.php?controller=register&action=user');
    }
    public function pre_change_pass()
    {
        if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true)
        {
            $items = Member::get_data($_SESSION['name']);
            $data = array('items' => $items);
            $this->render('pre_change_pass', $data);
            return;
        }
        else
        {
            header('Location:index.php?controller=pages&action=error');
        }
    }
    public function admin()
    {
        if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true)
        {
            if (isset($_POST['btn_submit']))
            {
                $username = $_SESSION['name'];
                $oldpassword = isset($_POST['oldpassword']) ? $_POST['oldpassword'] : '';
                $newpassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : '';
                $confirmpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';
                $check_pass = Member::check_password($username, $oldpassword);
                if (!$oldpassword || !$newpassword || !$confirmpassword)
                {
                    $this->msg = "Please provide your informations!";
                }
                else
                    {
                    if (!$check_pass)
                    {
                        $this->msg = "Invalid password";

                    }
                    elseif ($newpassword != $confirmpassword)
                    {
                        $this->msg = "Wrong confirm password!";
                    }
                    else
                        {
                        $change_pass = Member::change_password($username, $newpassword);
                            if ($change_pass == true)
                            {
                            $items = Member::get_data($username);
                            $data = array('$items' => $items);
                            header('Location:index.php?controller=register&action=admin&change_pass=success');
                            }
                        }
                    }
                $items = Member::get_data($_SESSION['name']);
                $data = array('items' => $items);
                $this->render('pre_change_pass', $data);
                return;
            }
            $items = Member::get_data($_SESSION['name']);
            $data = array('items' => $items);
            $this->render('admin', $data);
            return;
        }
        else
        {
            header('Location:index.php?controller=pages&action=error');
        }
    }
    public function user()
    {
        if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true)
        {
            if (isset($_POST['btn_submit']))
            {
                $username = $_SESSION['name'];
                $oldpassword = isset($_POST['oldpassword']) ? $_POST['oldpassword'] : '';
                $newpassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : '';
                $confirmpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';
                $check_pass = Member::check_password($username, $oldpassword);
                if (!$oldpassword || !$newpassword || !$confirmpassword)
                {
                    $this->msg = "Please provide your informations!";
                }
                else
                    {
                        if (!$check_pass)
                        {
                            $this->msg = "Invalid password";

                        }
                        elseif ($newpassword != $confirmpassword)
                        {
                            $this->msg = "Wrong confirm password!";
                        } else
                            {
                                $change_pass = Member::change_password($username, $newpassword);
                                if ($change_pass == true)
                                {
                                    $items = Member::get_data($username);
                                    $data = array('$items' => $items);
                                    header('Location:index.php?controller=register&action=user&change_pass=success');
                                }
                            }
                    }
                $items = Member::get_data($_SESSION['name']);
                $data = array('items' => $items);
                $this->render('pre_change_pass', $data);
                return;
            }
            $items = Member::get_data($_SESSION['name']);
            $data = array('items' => $items);
            $this->render('user', $data);
            return;
        }
        else
        {
            header('Location: index.php?controller=pages&action=error');
        }
    }
    public function logout()
    {
        if (isset($_SESSION["logged"]) && $_SESSION["logged"]== true)
        {
            $_SESSION["logged"] = false;
            $this->render('index');
            return;
        }
        else
        {
            header('Location:index.php?controller=pages&action=error');
        }

    }
}
?>