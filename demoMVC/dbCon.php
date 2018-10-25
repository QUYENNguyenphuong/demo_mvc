<?php
class dbCon
{
    private static $connection = null;


    public static function connect()
    {
        if(!isset(self::$connection))
        {
            self::$connection = new mysqli ("localhost", 'root', '', 'demo_mvc');
        }

        if(self::$connection == FALSE)
        {
            return FALSE;
        }
        return self::$connection;
    }

    public static function queryExecute($sqlString)
    {
        $conn = self::connect();

        $result = $conn->query( $sqlString);

        return $result;
    }

    public static function arraySelect($sqlString)
    {
        $rows = array();
        $result = self::queryExecute($sqlString);
        if($result == FALSE)
        {
            return FALSE;
        }
        while($item = $result->fetch_assoc())
        {
            $rows[] = $item;
        }
        return $rows;
    }

}
