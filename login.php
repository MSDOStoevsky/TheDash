<?php
require_once("src/auth.php");
if($_POST['un-field'] == '') redirect("./", USERNAME_ERROR, "Please supply a valid username.");
if($_POST['pw-field'] == '') redirect("./", PASSWORD_ERROR, "Please supply a valid password.");

if( attempt_login($_POST['un-field'], $_POST['pw-field']) )
{
    $_SESSION['username'] = $_POST['un-field'];
    if(isset($_POST['remember-field']))
        setcookie("USERNAME", $_POST['un-field'], time() + (86400 * 30), "/");
    redirect("console.php");
}
else
{
    redirect("./", PASSWORD_ERROR, "Incorrect username or password.");
}