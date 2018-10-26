<?php
/**
 * Created by PhpStorm.
 * User: Q
 * Date: 10/26/2018
 * Time: 10:58 AM
 */

class CommonHelper
{
    public static function Pagename()
    {
        $sitepage = explode("&", parse_url($_SERVER["SCRIPT_NAME"], PHP_URL_PATH));
        return $sitepage;
    }
}