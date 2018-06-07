<?php
    
    require 'src/auth.php';
    if( ctype_space($_POST['un-field'])) redirect("./", USERNAME_ERROR);
    if($_POST['remember-field'] == True) echo "a";
    if(ctype_space($_POST['pw-field'])) redirect("./", PASSWORD_ERROR);
    
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    redirect("index.php");
