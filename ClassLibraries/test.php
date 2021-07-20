<?php

require_once('MainClass.php');
$testDBcon = new mainClass();




// $result = $testDBcon->fetchInput('HDP22385746');
$result = $testDBcon->fetchResumeSummary();

// var_dump($result);
// print_r($result['birthday']);
print_r($result);
// echo $result['about'];
// while($skill_details = mysqli_fetch_assoc($result))
// {
//     echo $skill_details['skill'];
// }
// $row = mysqli_fetch_array($result);

// echo $row['name'];
// echo $result->name;