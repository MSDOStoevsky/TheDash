<?php
require_once("src/auth.php");
if($_POST['un-field'] == '') redirect("./", USERNAME_ERROR);
if($_POST['remember-field'] == True) echo "a";
if($_POST['pw-field'] == '') redirect("./", PASSWORD_ERROR);

if( attempt_login($_POST['un-field'], $_POST['pw-field']) )
{
    $_SESSION['username'] = $_POST['un-field'];
    redirect("dash.php");
}
else
{
    redirect("./", PASSWORD_ERROR);
}