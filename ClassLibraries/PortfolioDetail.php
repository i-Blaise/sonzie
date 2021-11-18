<?php

require_once('DatabaseCon.php');

class portfolioDetailsClass extends DataBase{

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

    function aboutMe(){
        $myQuery = "SELECT * FROM about_me";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

  
        
    

}

?>