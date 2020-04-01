<?php
$folder = $_POST["folder"];
$dept = $_POST["dept"];
$filecount = 0;
$files = glob($folder . "/*");
if ($files){
 $filecount = count($files);
}
echo json_encode($dept."-".$filecount);
?>