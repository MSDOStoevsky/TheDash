<?php
    require_once("auth.php");
    const STORAGE_PATH = 'C:\Program Files (x86)\Ampps\www\TheDash\storage\\'; //'/usr/share/objects/';
    const HOSTS_PATH = 'C:\Program Files (x86)\Ampps\www\TheDash\hosts\\'; //'/var/www/';

    /* handler */

    if(isset($_POST['upload-storage'])) upload_to_storage($_SESSION['username']);
    else if(isset($_POST['delete-storage'])) delete_from_storage($_SESSION['username']);

    function upload_to_storage($un)
    {
        
        $target_file = STORAGE_PATH.basename($_FILES["file-field"]["name"]);
        $uploadOk = 1;
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["file-field"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file-field"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["file-field"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    function delete_from_storage($un)
    {
        print_r($_POST);
    }

    function create_host($un, $dir, $port)
    {

    }

    /* helpers */
    function list_storage() {
        $data = array();
        $files = array_slice(scandir(STORAGE_PATH),2);
        foreach($files as $file)
        {
            array_push(
                $data,
                array(
                    $file, 
                    filesize(STORAGE_PATH.$file),
                    pathinfo((STORAGE_PATH.$file), PATHINFO_EXTENSION)
                )
            );
        }
        return $data;
    }

    function grab_from_storage($un)
    {
        
    }

    function list_hosts() {
        return array_diff(scandir(HOSTS_PATH), array('.', '..'));
    }

?>