<?php
    require 'src/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <main class="wrapper">
        
        <div class="container">
            <h1>Super Dash</h1>
            <form action="login.php" method="POST">
                <fieldset>
                    <label for="un-field">Username</label>
                    <input placeholder="e.g., BigBoy5" name="un-field" id="un-field" type="text" required>
                    <label for="un-field">Password</label>
                    <input  id="pw-field" name="pw-field" type="password" required>
                    <div class="float-right">
                    <input id="remember-field" type="checkbox">
                    <label class="label-inline" name="remember-field" for="remember-field">Remember me</label>
                    </div>
                    <input class="button-primary" value="Log in" type="submit">
                </fieldset>
            </form>
                <?php 
                    if($_SESSION['error'] == USERNAME_ERROR) echo "<strong>Error!</strong> That user does not exist.";
                    else if($_SESSION['error'] == PASSWORD_ERROR) echo "<strong>Error!</strong> Incorrect username or password.";
                    else if($_SESSION['error'] == AUTH_ERROR)     echo "<strong>Error!</strong> You need to be logged in.";
                ?>
            </div>
        </div>
    </main>
    <div id="account-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="close fa fa-close"></i>
                <h2>New Account</h2>
            </div>
            <div class="modal-body">
                <form action="src/api.php" method="POST">
                    <label for="un-field">Username</label>
                    <input placeholder="e.g., BigBoy5" name="un-field" id="un-field" type="text" required>
                    <label for="new-pw-field">Password</label>
                    <input  id="new-pw-field" name="new-pw-field" type="password" required>
                    <label for="confirm-pw-field">Password</label>
                    <input  id="confirm-pw-field" name="confirm-pw-field" type="password" required>
                    <label for="new-email-field">Email (optional)</label>
                    <input  id="new-email-field" name="new-email-field" type="email">
                    <div class="float-right"></div>
                <input class="button-primary" value="Create" type="submit">
                </form>
            </div>
        </div>
    </div>
    <script>


    </script>
</body>
