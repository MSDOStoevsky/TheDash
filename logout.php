<?php
    require_once 'src/auth.php';

    unset($_SESSION['username']);
    session_destroy();
    redirect("./");
