<?php
    
    require 'src/auth.php';
    if($_POST['un-field'] == '') Redirect("./", USERNAME_ERROR);
    if($_POST['remember-field'] == True) echo "a";
    if($_POST['pw-field'] == '') Redirect("./", PASSWORD_ERROR);
    
    session_start();
    $_SESSION['username'] = $_POST['un-field'];


    Redirect("dash.php");
