<?php

require_once('DatabaseCon.php');

class mainClass extends DataBase{

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

    function countSkills(){
        $myQuery = "SELECT * FROM skills";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result->num_rows;
    }

    function fetchSkillDetails1(){
        $num = ceil($this->countSkills()/2);
        $myQuery = "SELECT * FROM skills ORDER BY id ASC LIMIT $num";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchSkillDetails2(){
        $num = floor($this->countSkills()/2);
        $myQuery = "SELECT * FROM skills ORDER BY id DESC LIMIT $num";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchSkillDesc(){
        $myQuery = "SELECT skill_desc FROM skills WHERE id = 1";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function fetchResumeDesc(){
        $myQuery = "SELECT description FROM resume_desc WHERE id = 1";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function fetchResumeSummary(){
        $myQuery = "SELECT * FROM resume_summary WHERE id = 1";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function fetchResumeEdu(){
        $myQuery = "SELECT * FROM resume_edu";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchResumeExp(){
        $myQuery = "SELECT * FROM resume_experience";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchMainPortfolioDesc(){
        $myQuery = "SELECT * FROM portfolio_desc WHERE id = 1";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function fetchPortfolio(){
        $myQuery = "SELECT * FROM portfolio";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchServiceDetails1(){
        $num = ceil($this->countSkills()/2);
        $myQuery = "SELECT * FROM services ORDER BY id ASC LIMIT $num";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchServiceDetails2(){
        $num = floor($this->countSkills()/2);
        $myQuery = "SELECT * FROM services ORDER BY id DESC LIMIT $num";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchServiceDesc(){
        $myQuery = "SELECT * FROM services_desc WHERE id = 1";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function fetchContact(){
        $myQuery = "SELECT * FROM contact";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }


    function saveInput($inputData, $code)
    {

        if(is_object($inputData) || is_array($inputData))
        {
            $name = $inputData['name'];
            $mothers_name = $inputData['mothers_name'];
            $message = $inputData['message'];

            $myQuery = "INSERT INTO certificate_input  (
                name,
                mothers_name,
                message,
                code) VALUES (
                '$name',
                '$mothers_name',
                '$message',
                '$code'
                )";

            $result = mysqli_query($this->dbh, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }

        }
    }

    function fetchInput($code)
    {
        $myQuery = "SELECT * FROM certificate_input WHERE code = '$code'";
        $result = mysqli_query($this->dbh, $myQuery);
        // $row = mysqli_fetch_assoc($result);
        // return $row;
        // return $result;
        $num = mysqli_num_rows($result);
        if($num == 1)
        {
          return $result;
        }elseif($num < 1){
           return 'not found';
        }else{
         return 'error';
        }
        
    }

}