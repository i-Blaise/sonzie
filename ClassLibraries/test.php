<?php

require_once('MainClass.php');
// require_once('AdminClass.php');
$testDBcon = new mainClass();
// $testDBcon = new adminClass();




// $result = $testDBcon->fetchInput('HDP22385746');
// $result = $testDBcon->adminLogin('mega_mhie', '0c867dafe9250d5b5e07ecd18e94f78f');


$portResult = $testDBcon->fetchPortfolio();



// print_r($portResult);
// print_r($portResult['image2']);
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
echo $portResult->id;


// for image dimensions when posting it
// list($width, $height) = getimagesize('http://localhost/sonzie.online/assets/img/portfolio/portfolio-1.jpg');
// echo "width: " . $width . "<br />";
// echo "height: " .  $height;