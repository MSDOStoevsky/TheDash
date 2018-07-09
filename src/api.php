<?php
    require_once("auth.php");
    const STORAGE_PATH = 'C:\Program Files (x86)\Ampps\www\TheDash\storage\\'; //'/usr/share/objects/';
    const HOSTS_PATH = 'C:\Program Files (x86)\Ampps\www\TheDash\hosts\\'; //'/var/www/';

    /* handler */
    if(isset($_POST['upload-storage'])) upload_to_storage($_SESSION['username']);
    else if(isset($_POST['delete-storage'])) delete_from_storage($_SESSION['username']);

    function account_info($un)
    {
        $user_dir = STORAGE_PATH.$un.'\\';
        
    }

    function upload_to_storage($un)
    {
        $user_dir = STORAGE_PATH.$un.'\\';
        $target_file = $user_dir.basename($_FILES["file-field"]["name"]);
        
        if (is_writable(realpath($user_dir))) { 
            if (move_uploaded_file($_FILES["file-field"]["tmp_name"], $target_file)) {
                redirect("");
            } else {
                redirect("", WRITE_ERROR, "upload failed: something happened along the way.");
            }
        } else {
            redirect("", WRITE_ERROR, "upload failed: directory unwritable");
        }
    }

    function delete_from_storage($un)
    {
        $failed = 0;
        if(!empty($_POST['storage-marked']))
        {
            foreach ($_POST['storage-marked'] as $file)
            {
                $user_dir = STORAGE_PATH.$un.'\\';
                $target_file = $user_dir.$file;
                if (is_writable(realpath($user_dir)))
                    unlink(realpath($target_file));
                else
                    $failed++;
            }
        }
        if( $failed > 0) redirect("", WRITE_ERROR, "delete failed: $failed files could not be deleted");
        else redirect("");
    }

    function create_host($un, $dir, $port)
    {
        
    }

    /* helpers */
    function list_storage() {
        $data = array();
        $files = array_slice(scandir(STORAGE_PATH.$_SESSION['username']),2);
        foreach($files as $file)
        {
            array_push(
                $data,
                array(
                    $file,
                    filesize(STORAGE_PATH.$_SESSION['username'].'\\'.$file),
                    pathinfo((STORAGE_PATH.$_SESSION['username'].'\\'.$file), PATHINFO_EXTENSION)
                )
            );
        }
        return $data;
    }

    function dl_from_storage($un)
    {
        
    }

    function list_hosts() {
        $data = array();
        $files = array_slice(scandir(HOSTS_PATH.$_SESSION['username']),2);
        foreach($files as $file)
        {
            array_push(
                $data,
                array(
                    $file, 
                    -1,
                    "temp",
                    "temp"
                )
            );
        }
        return $data;
    }

?>
