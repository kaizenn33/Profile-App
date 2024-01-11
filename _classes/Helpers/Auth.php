<?php

namespace Helpers;

class Auth{
    static function check(){
        session_start();
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        else{
            HTTP::redirect("/index.php", "auth=fail");
        }//namespace tuu yin class twy import lote sayr ma lo pel khw thone loh ya
    }
}