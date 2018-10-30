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
    public function sign_up()
    {
        if(isset($_POST['btn_signup']))
        {
            $username = isset($_POST['username']) ? ($_POST['username']) : '';
            $password = isset($_POST['password']) ? ($_POST['password']) : '';
            $level    = isset($_POST['level'])    ? (int)$_POST['level'] : '';
            if(!$username || !$password || !$level)
            {
                $this->msg = " Vui lòng điền đầy đủ thông tin";
            }
            else {
                $check_name = Member::check_user($username);
                if ($check_name) {
                    $this->msg = "Tên tài khoản đã được dùng";
                } else {
                    $item_insert = Member::add_member($username, $password, $level);
                    if ($item_insert == true) {
                        $this->msg = " Đăng kí thành công";
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
                $this->msg = " Vui lòng điền đầy đủ thông tin";
            }
            else {
                $user_login = Member::login($username, $password);
                if (!$user_login)
                {
                    $this->msg = "Đăng nhập không thành công  ";
                }
                else
                {
                    if($admin_login)
                    {
                        $_SESSION['username'] = $username;
                        $this->msg = " Xin chào admin $username  ";
                    }
                    else
                    {
                        $_SESSION['username'] = $username;
                        $this->msg = " Xin chào $username  ";
                    }
                }
            }
        }
        $this->render('login');
    }

}
?>