<?php
/**
 * Created by PhpStorm.
 * User: Q
 * Date: 10/30/2018
 * Time: 10:24 AM
 */

class Member
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $level;

    /**
     * Register constructor.
     * @param $id
     * @param $username
     * @param $password
     * @param $email
     * @param $level
     */
    public function __construct($id, $username, $password,$email, $level)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->level = $level;
    }
    public static function get_data($username)
    {
        $sql = "SELECT * FROM member WHERE username= '$username'";
        $query = dbCon::arraySelect($sql);
        $list = [];
        foreach ($query as $item) {
            $list[] = new Member($item['id'], $item['username'], $item['password'],$item['email'], $item['level']);
        }
        return $list;
    }
    public static function check_user($username)
    {
        $sql = "SELECT * FROM member WHERE username = '$username'";
        $query = dbCon::arraySelect($sql);
        return $query;
    }
    public static function add_member($username, $password,$email, $level)
    {
        $sql = "INSERT INTO member(username, password, email, level) VALUES ('$username', '$password','$email', '$level')";
        $result = dbCon::queryExecute($sql);
        return $result;
    }
    public static function check_admin($username)
    {
        $sql = "SELECT * FROM member WHERE username='$username' and level = 'admin'";
        $kq = dbCon::arraySelect($sql);
        return $kq;
    }
    public static function login($username, $password)
    {
        $sql = "SELECT * FROM member WHERE username= '$username' and password ='$password'";
        $query = dbCon::arraySelect($sql);
        return $query;
    }
    public static function check_password($username,$password)
    {
        $sql = "SELECT * FROM member WHERE username = '$username' and  password = '$password'";
        $query = dbCon::arraySelect($sql);
        return $query;
    }
    public static function change_password($username, $password)
    {
        $sql = "UPDATE member SET password = '$password'  WHERE username = '$username' ";
        $k = dbCon::queryExecute($sql);
        return $k;
    }

}