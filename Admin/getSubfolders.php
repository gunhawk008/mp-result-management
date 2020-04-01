<?php 
$folder = $_POST["folder"];
$dept = $_POST["dept"];

$out = array();
foreach (glob($folder."/*", GLOB_ONLYDIR) as $filename) {
    // $p = pathinfo($filename);
    // $out[] = $p['filename'];
    if($dept == "")
    $out[] = pathinfo($filename)["filename"];
    else
    $out[] = pathinfo($filename)["filename"]."-".$dept;
}
// echo json_encode($folder."/*");
echo json_encode($out);
?>