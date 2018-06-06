<!--<?php
    require_once("src/auth.php");
    require_once("src/api.php");
?>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Console</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <main class="wrapper">
    <nav class="navigation">
        <div class="container">
            <ul class="navigation-list float-right">
                <li class="navigation-item">
                    <div class="dropdown">
                        <a class="navigation-link dropbtn" href=""><?php echo $_SESSION['username']; ?><i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a id="logout-btn" href="">Log Out <i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                </li>

                <li class="navigation-item">
                    <a class="navigation-link" href="">Settings</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="container disk-ops">
        <h1>Disk Util</h1>
        <div class="options center">
            <button id="upload-btn" class="button">Upload File</button>
            <button id="stats-btn" class="button">Stats</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Size (bytes)</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="">example.png</a>
                    </td>
                    <td>520</td>
                    <td>Image</td>
                </tr>
            </tbody>
        </table>
    </section>
    </main>

    <div id="upload-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Choose File</h2>
            </div>
            <div class="modal-body">
                <form action="api.php" method="POST">
                    <fieldset>
                        <label for="file-field">File</label>
                        <input name="file-field" id="file-field" type="file">
                        
                        <input class="button-primary" value="Upload" type="submit">
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <h3>Modal Footer</h3>
            </div>
        </div>
    </div>

    <div id="stats-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Disk Usage Stats</h2>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Space Used: <span><?php echo $space_used ?></span>/1000</li>
                </ul>
            </div>
            <div class="modal-footer">
                <h3>Modal Footer</h3>
            </div>
        </div>
    </div>
    <script>

        // upload modal
        $("#upload-btn").on("click", function() {
            $("#upload-modal").css("display","block");
        });
        // stats modal
        $("#stats-btn").on("click", function() {
            $("#stats-modal").css("display","block");
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
