<?php
    
    const NO_ERROR        = 0;
    const USERNAME_ERROR  = 1;
    const PASSWORD_ERROR  = 2;

    session_start();

    function Redirect($url, $error = NO_ERROR, $permanent = false)
    {
        if($error != NO_ERROR) $_SESSION['error'] = $error;
        if(isset($_SERVER['HTTP_HOST']))
          header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }