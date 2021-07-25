<?php

require_once('MainClass.php');
$testDBcon = new mainClass();




// $result = $testDBcon->fetchInput('HDP22385746');
// $result = $testDBcon->fetchPortfolio();

// var_dump($result);
// print_r($result['birthday']);
// print_r($result['description']);
// echo $result['about'];
// while($skill_details = mysqli_fetch_assoc($result))
// {
//     echo $skill_details['portfolio-title'];
// }
// $row = mysqli_fetch_array($result);

// echo $row['name'];
// echo $result->name;


// for image dimensions when posting it
list($width, $height) = getimagesize('http://localhost/sonzie.online/assets/img/portfolio/portfolio-1.jpg');
echo "width: " . $width . "<br />";
echo "height: " .  $height;