<?php
    $REQ = basename(__FILE__);
    require_once('dash.php');

    $storage = list_storage();
    $hosts = list_hosts();
?>
<section id="storage-console" class="container">
    <h1>Storage
    <?php
    if($_SESSION['error'] == WRITE_ERROR) 
        echo "<i class='error-message fa fa-exclamation-circle' title='".$_SESSION['error_msg']."'></i>";
    ?>
    </h1>
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
            <?php
            foreach ( $hosts as $item )
            {
                echo "
                <tr>
                    <td>
                        <a href=''>".$item[0]."</a>
                    </td>
                    <td>";
                if ($status == -1) echo "Stopped";
                else if ($status == 0) echo "Running";
                else if ($status == 1) echo "Stalled";
                else echo "Error";
                echo "
                    </td>
                    <td>".$item[2]."</td>
                    <td>".$item[2]."</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<div id="storageops-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="close fa fa-close"></i>
                <h2>Operations</h2>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class='row'>
                        <div class='column column-50'><b>File Name</b></div>
                        <div class='column column-25'><b>Size (bytes)</b></div>
                        <div class='column column-25'><b>Mark</b></div>
                    </div>
                    <?php
                        foreach ( $storage as $item )
                        {
                            echo "
                            <div class='row'>
                                <div class='column column-50'>".$item[0]."</div>
                                <div class='column column-25'>".$item[1]."</div>
                                <div class='column column-25'>
                                    <input type='checkbox' name='storage-marked[]' value='".$item[0]."'>
                                </div>
                            </div>";
                        }
                    ?>
                    <div class="options">
                        <input class="button" value="Delete" type="submit" name="delete-storage">
                        <input class="button" value="Share" type="submit">
                    </div>
                </form>
                <div class=""></div>
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
                        
                        <input class="button-primary float-right" value="Host" type="submit">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>