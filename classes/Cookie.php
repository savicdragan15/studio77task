<?php
class Cookie{
    public static function set($cookie_name, $cookie_value, $days, $path = "", $domain = "", $secure = false, $http_only = false) {
        setcookie($cookie_name, $cookie_value, time() + (86400 * $days), $path, $domain, $secure, $http_only); // 86400 = 1 day
    }

    public static function get($cookie_name){
        if(isset($_COOKIE[$cookie_name])) return $_COOKIE[$cookie_name];
         else return false;
    }
    
    public static function delete($cookie_name) {
        if (isset($_COOKIE[$cookie_name])) {
            foreach ($_COOKIE as $name => $value)
                if ($cookie_name == $name) {
                    setcookie($name, $value, time() - (86400 * 30), "/");
                    return true;
                }
        } else
            return false;
    }

}

//setcookie("id", (string)$_SESSION["id"], time()+60 * 60 * 24 * 30,"/","www.tender5.net",isset($_SERVER["HTTPS"]),true);

