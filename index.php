
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
            <h1>The Dash</h1>
            <form action="login.php" method="POST">
                <fieldset>
                    <label for="un-field">Username</label>
                    <input placeholder="examplename" name="un-field" id="un-field" type="text">
                    <label for="un-field">Password</label>
                    <input  id="pw-field" name="pw-field" type="password">
                    <div class="float-right">
                    <input id="remember-field" type="checkbox">
                    <label class="label-inline" name="remember-field" for="remember-field">Remember me</label>
                    </div>
                    <input class="button-primary" value="Log in" type="submit">
                </fieldset>
            </form>
            <div class="alert">
                <?php if($error == USERNAME_ERROR) echo "<strong>Error!</strong> That user does not exist.";
                else if($error == PASSWORD_ERROR) echo "<strong>Error!</strong> Incorrect username or password.";
                else if($error == AUTH_ERROR)     echo "<strong>Error!</strong> You need to be logged in."; ?>
            </div>
        </div>

    </main>
    <script>


    </script>
</body>