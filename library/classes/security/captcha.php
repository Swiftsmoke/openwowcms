<?php
/************************************************************************
*                       library/classes/security/captcha.php
*                            -------------------
*      Copyright (C) 2012
*
*      This package is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
*      Updated: $Date 2012/12/26 11:30 $
*
************************************************************************/
class captcha {
    public static function createcaptcha($action)
    {
        // set captcha
        if (!isset($_SESSION['captcha']) || !is_array($_SESSION['captcha'])) $_SESSION['captcha'] = array();

        $_SESSION['captcha'][$action] = captcha::generatestr(10);
        // Convert to image!
        echo $_SESSION['captcha'][$action];
    }

    public static function generatestr($length){
        $randstr = "";
        for($i=0; $i<$length; $i++){
            $randnum = mt_rand(0,61);
            if($randnum < 10){
                $randstr .= chr($randnum+48);
            }else if($randnum < 36){
                $randstr .= chr($randnum+55);
            }else{
                $randstr .= chr($randnum+61);
            }
        }
        return $randstr;
    }

    public static function verifycaptcha($captcha, $action) {
        if (!isset($_SESSION['captcha'])) return false;
        if (!isset($_SESSION['captcha'][$action])) return false;

        // verify captcha
        if($captcha == $_SESSION['captcha'][$action])
            return true;
        return false;
    }
}
?>