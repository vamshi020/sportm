<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['id']);
if(!isset($_SESSION['username'])){header("Location:./login.php");}
else
	header("Location:./userview.php");
?>