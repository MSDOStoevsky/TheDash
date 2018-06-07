<?php
require_once("src/auth.php");
if($_POST['un-field'] == '') Redirect("./", USERNAME_ERROR);
if($_POST['remember-field'] == True) echo "a";
if($_POST['pw-field'] == '') Redirect("./", PASSWORD_ERROR);

if( attempt_login($_POST['un-field'], $_POST['pw-field']) )
{
    $_SESSION['username'] = $_POST['un-field'];
    Redirect("dash.php");
}
else
{
    Redirect("./", PASSWORD_ERROR);
}