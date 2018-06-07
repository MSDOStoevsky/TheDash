<?php
    require_once("src/auth.php");
    require_once("src/api.php");
    if(!checkAuth()) Redirect('./', AUTH_ERROR); //TODO error message not displaying
    $storage = list_storage();
    $hosts = list_hosts();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <main class="wrapper">
    <nav class="navigation">
        <div class="container">
            <div class="navigation-title">Super Dash</div>
            <ul class="navigation-list float-right">
                <li class="navigation-item">
                    <div class="dropdown">
                        <a class="navigation-link dropbtn" href=""><?php echo strtoupper($_SESSION['username']); ?> <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-content">
                        <a href="#">My Account</a>
                        <a id="logout-btn" href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                        </div>
                    </div>
                </li>

                <li class="navigation-item">
                    <a class="navigation-link" href="">Settings</a>
                </li>
            </ul>
        </div>
    </nav>

    <section id="storage-console" class="container">
        <h1>Storage</h1>
        <div class="options">
            <button id="ops-btn" class="button button-clear">Ops</button>
            <button id="upload-btn" class="button button-clear">Upload</button>
            <button id="stats-btn" class="button button-clear">Stats</button>
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
                <?php
                    foreach ( $storage as $item )
                    {
                        echo "
                        <tr>
                            <td>
                                <a href=''>".$item[0]."</a>
                            </td>
                            <td>".$item[1]."</td>
                            <td>".$item[2]."</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

    <section id="host-console" class="container">
        <h1>Hosting</h1>
        <div class="options">
            <button id="ops-btn" class="button button-clear">Ops</button>
            <button id="host-btn" class="button button-clear">Host</button>
            <button id="stats-btn" class="button button-clear">Stats</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Program</th>
                    <th>Status</th>
                    <th>Port</th>
                    <th>Usage</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="">example.com</a>
                    </td>
                    <td>
                        <?php
                            if ($status == -1) echo "Stopped";
                            else if ($status == 0) echo "Running";
                            else if ($status == 1) echo "Stalled";
                            else echo "Error";
                        ?>
                    </td>
                    <td>555</td>
                    <td>52 kb/s</td>
                </tr>
            </tbody>
        </table>
    </section>

    <footer>

    </footer>
    </main>

    <div id="storageops-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="close fa fa-close"></i>
                <h2>Operations</h2>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                <?php
                    foreach ( $storage as $item )
                    {
                        echo "
                        <div class='row'>
                            <div class='column'>".$item[0]."</div>
                            <div class='column'>".$item[1]."</div>
                            <div class='column'><input name='' type='checkbox'></div>
                        </div>";
                    }
                ?>
                <input class="button button-outline" value="Delete" type="button" name="delete-storage">
                <input class="button button-outline" value="Share" type="submit">
                </form>
            </div>
        </div>
    </div>

    <div id="upload-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="close fa fa-close"></i>
                <h2>Choose File</h2>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <input name="file-field" id="file-field" type="file"><br>
                        <input class="button-primary" value="Upload" type="submit" name="upload-storage">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <div id="stats-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="close fa fa-close"></i>
                <h2>Disk Usage Stats</h2>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Space Used: <span><?php echo $space_used ?></span>/1000</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="hostops-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="close fa fa-close"></i>
                <h2>Operations</h2>
            </div>
            <div class="modal-body">
                <form action="src/api.php" method="POST">
                <?php
                    foreach ( $hosts as $item )
                    {
                        echo "
                        <div class='row'>
                            <div class='column'>".$item[0]."</div>
                            <div class='column'>".$item[1]."</div>
                            <div class='column'><input name='' type='checkbox'></div>
                        </div>";
                    }
                ?>
                <input class="button button-outline" value="Delete" type="button" name="delete-host">
                <input class="button button-outline" value="Share" type="submit">
                </form>
            </div>
        </div>
    </div>

    <div id="host-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="close fa fa-close"></i>
                <h2>Host New File</h2>
            </div>
            <div class="modal-body">
                <form action="<?php create_host($_SESSION['username'], $_POST) ?>" method="POST">
                    <fieldset>
                        <label for="file-field">Name</label>
                        <input placeholder="e.g., Terraria" name="host-name-field" id="host-name-field" type="text" required>

                        <label for="host-dir-field">Path</label>
                        <input name="host-dir-field" id="host-dir-field" type="file" required>


                        <label for="host-port-field">Port</label>
                        <input placeholder="e.g., 80" name="host-port-field" id="host-port-field" type="number" min="1" required>
                        
                        <input class="button-primary" value="Host" type="submit">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

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
