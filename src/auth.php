<?php
    require_once("lib/dbops.php");
    const NO_ERROR        = 0;
    const USERNAME_ERROR  = 1;
    const PASSWORD_ERROR  = 2;

    session_start();
    
    function attempt_login($un, $pw)
    {
        $db = new DB();
        if(!$db) {
            echo $db->lastErrorMsg();
        } else {
            echo ("Opened database successfully\n");
        }
        $ret = $db->db_exist($un, $pw);
        if( $ret == 0 ) return false;
        else if( $ret == 1 ) return true;
    }
    
    function Redirect($url, $error = NO_ERROR, $permanent = false)
    {
        if($error != NO_ERROR)
            $_SESSION['error'] = $error;
        if(isset($_SERVER['HTTP_HOST']))
            header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }