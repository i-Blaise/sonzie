<?php

require_once('DatabaseCon.php');

class adminClass extends DataBase{

    function dbtest(){
        $result = $this->dbh;
        return $result;
    }

    function anotherTest(){
        $myQuery = "SELECT birthday FROM about_me";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function adminLogin($username, $password){
        $myQuery = "SELECT * FROM admin_cred WHERE username = '$username' AND pass = '$password'";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }


}