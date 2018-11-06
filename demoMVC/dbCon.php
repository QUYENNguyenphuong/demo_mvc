<?php
class dbCon
{
    private static $connection = null;


    public static function connect()
    {
        if(!isset(self::$connection))
        {
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli ("localhost", $config['username'], $config['password'], $config['databasename'] );
        }

        if(self::$connection == false)
        {
            return false;
        }
        return self::$connection;
    }
    public static function prepare_sql($sqlString)
    {
        $conn = self::connect();
        $result = $conn->prepare($sqlString);
        return $result;
    }
    public static function queryExecute($sqlString)
    {
        $conn = self::connect();
        $result = $conn->query($sqlString);
        return $result;
    }
    public static function arraySelect($sqlString)
    {
        $rows = array();
        $result = self::queryExecute($sqlString);
        if($result == false)
        {
            return false;
        }
        while($item = $result->fetch_assoc())
        {
            $rows[] = $item;
        }
        return $rows;
    }
}
