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
    public $level;

    /**
     * Register constructor.
     * @param $id
     * @param $username
     * @param $password
     * @param $level
     */
    public function __construct($id, $username, $password, $level)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->level = $level;
    }
    public function get_data()
    {
        $sql = 'SELECT * FROM member';
        $query = dbCon::arraySelect($sql);
        $list = [];
        foreach ($query as $item) {
            $list[] = new Member($item['id'], $item['username'], $item['password'], $item['level']);
        }
        return $list;
    }
    public static function check_user($username)
    {
        $sql = "SELECT * FROM member WHERE username = '$username'";
        $query = dbCon::arraySelect($sql);
        return $query;
    }
    public static function add_member($username, $password, $level)
    {
        $sql = "INSERT INTO member(username, password, level) VALUES ('$username', '$password', '$level')";
        $result = dbCon::queryExecute($sql);
        return $result;
    }
    public static function check_admin($username)
    {
        $sql = "SELECT * FROM member WHERE username='$username' and level = '1'  ";
        $kq = dbCon::arraySelect($sql);
        return $kq;
    }
    public static function login($username, $password)
    {
        $sql = "SELECT * FROM member WHERE username= '$username' and password ='$password'";
        $query = dbCon::arraySelect($sql);
        return $query;
    }




}