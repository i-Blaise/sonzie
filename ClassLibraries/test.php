<?php

// require_once('MainClass.php');
require_once('AdminClass.php');
require_once('PortfolioClass.php');
// $testDBcon = new mainClass();
$testDBcon = new adminClass();
$portfolioPlug = new portfolioClass();




// $result = $testDBcon->fetchInput('HDP22385746');
// $result = $testDBcon->adminLogin('mega_mhie', '0c867dafe9250d5b5e07ecd18e94f78f');
$result = $portfolioPlug->fetchPortfolioDetail(1);

// var_dump($result);
print_r($result['id']);
// print_r($result['description']);
// echo $result['name'];
// if(isset($result['name']))
// {
//     echo $result['name'];
// }else{
//     echo 'yawa';
// }
// $d = 0;
// while($skill_details = mysqli_fetch_assoc($result))
// {
//     $d += 100;
//     echo $d;
//     echo $skill_details['service-name'];
// }
// $row = mysqli_fetch_array($result);

// echo $row['name'];
// echo $result->name;


// for image dimensions when posting it
// list($width, $height) = getimagesize('http://localhost/sonzie.online/assets/img/portfolio/portfolio-1.jpg');
// echo "width: " . $width . "<br />";
// echo "height: " .  $height;