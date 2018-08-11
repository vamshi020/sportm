 <?php 
  session_start();
  ?>
 <?php

if($_GET["id"]&& $_GET["gid"]){
	$db = mysqli_connect("localhost","root","","login");
	$sql="UPDATE `responses` SET `status`=1 WHERE `id`=".$_GET["id"];
	$result = mysqli_query($db,$sql);
	header("Location: ./uregisterd.php");
}
?>