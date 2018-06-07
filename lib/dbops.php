<?php

class DB extends SQLite3 {

    function __construct() {
        $this->open('db/users.db');
    }

    function db_exist($un, $pw){
        $sql = "SELECT `password` from `Users` WHERE `username`='".$un."'";
        $ret = $this->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        password_verify($pw, $row['password']);

        if( password_verify($pw, $row['password']) ) return 1;
        else return 0;
    }
}

