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
        $sql = "SELECT * FROM member WHERE username= ? ";
        $stmt = dbCon::prepare_sql($sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $list = [];
        if ($stmt_result->num_rows > 0)
        {
            while ($item = $stmt_result->fetch_assoc())
            {
                $list[] = new Member($item['id'], $item['username'], $item['password'],$item['email'], $item['level']);
            }
        }
        return $list;
    }
    public static function check_user($username)
    {
        $sql = "SELECT * FROM member WHERE username = ?";
        $stmt = dbCon::prepare_sql($sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $query = mysqli_stmt_fetch($stmt);
        return $query;
    }
    public static function add_member($username, $password,$email, $level)
    {
        $sql = "INSERT INTO member(username, password, email, level) VALUES (?, ?, ?, ?)";
        $stmt = dbCon::prepare_sql($sql);
        mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $email, $level);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
    public static function check_admin($username)
    {
        $sql = "SELECT * FROM member WHERE username= ? and level = 'admin'";
        $stmt = dbCon::prepare_sql($sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $kq = mysqli_stmt_fetch($stmt);
        return $kq;
    }
    public static function login($username, $password)
    {
//         $sql = "SELECT * FROM member WHERE username= '$username' and password = '$password' ";
//         $query = dbCon::arraySelect($sql);
//         return $query;
        $stmt = dbCon::prepare_sql("SELECT * FROM member WHERE username= ? and password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $row = mysqli_stmt_fetch($stmt);
        return $row;
    }
    public static function check_password($username,$password)
    {
//        $sql = "SELECT * FROM member WHERE username = '$username' and  password = '$password'";
//        $result = dbCon::arraySelect($sql);
//        return $result;
        $stmt = dbCon::prepare_sql("SELECT * FROM member WHERE username = ? and  password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $row = mysqli_stmt_fetch($stmt);
        return $row;
    }
    public static function change_password($username, $password)
    {
        //$sql = "UPDATE member SET password = '?'  WHERE username = '?' ";
        $stmt = dbCon::prepare_sql("UPDATE member SET password = ?  WHERE username = ? ");
        mysqli_stmt_bind_param($stmt, "ss", $password, $username);
        $k = mysqli_stmt_execute($stmt);
        return $k;
    }
}