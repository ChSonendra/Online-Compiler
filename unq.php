<?php 
$name = $_POST['name'];
$a = uniqid($name);
setcookie("unq_id",$a,time() + 3 *3600, "/");
echo $a;
?>