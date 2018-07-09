<?php
    require_once("src/auth.php");
    require_once("src/api.php");
    if(!checkAuth()) Redirect('./', AUTH_ERROR, "You must be logged in to do that."); //TODO error message not displaying
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <main class="wrapper">
    <nav class="navigation">
        <div class="container">
            <div class="navigation-title"><a href="console.php">Super Dash</a></div>
            <ul class="navigation-list float-right">
                <li class="navigation-item">
                    <div class="dropdown">
                        <a class="navigation-link dropbtn" href=""><?php echo ($_SESSION['username']); ?> <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-content">
                        <a href="account.php"><i class="fa fa-user"></i> My Account</a>
                        <a href="settings.php"><i class="fa fa-cog"></i> Settings</a>
                        <a id="logout-btn" href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                        </div>
                    </div>
                </li>

                <li class="navigation-item">
                    <a class="navigation-link" href=""></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- S.P.A. center -->
    <?php
    include($REQ);
    ?>

    <footer>

    </footer>
    </main>
    <script>
        // ops modal
        $("#ops-btn").on("click", function() {
            $("#storageops-modal").css("display","block");
        });
        // upload modal
        $("#upload-btn").on("click", function() {
            $("#upload-modal").css("display","block");
        });
        // stats modal
        $("#stats-btn").on("click", function() {
            $("#stats-modal").css("display","block");
        });
        // stats modal
        $("#host-btn").on("click", function() {
            $("#host-modal").css("display","block");
        });

        // general modal ops
        $(".modal .close").on("click", function() {
            $(".modal").css("display","none");
        });


        // general listeners
        $("#logout-btn").on("click", function(){

        });

        // When the user clicks anywhere outside of the modal, close it
        $(window).on("click", function(event) {
            if (event.target == $(".modal")) {
                $(".modal").css("display","none");
            }
        });
        
    </script>
</body>
</html>
<?php exit(); ?>