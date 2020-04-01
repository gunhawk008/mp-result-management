<?php 

// Include config file
require_once "../config.php";

$user = $_POST["user"];
$out = "";
$temp = substr($user,0,strlen($user)-1);
$temp = substr($user,0,strripos($temp,"-"));
// echo $temp;
$sql = "SELECT * FROM users WHERE name = '$temp'";
// echo $sql;
$result1 =  mysqli_query($link, $sql);
// Check if username exists, if yes then verify password
if (mysqli_num_rows($result1) > 0) {
    $out="Yes".substr($user,-1);
}
else{
    $out="No".substr($user,-1);
}

// echo json_encode($folder."/*");
echo json_encode($out);
?>