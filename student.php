<!DOCTYPE html>
<html>
<head>
	<title>user rtregistrations</title>
	<h1 style="color:orange;text-align:center; text-indent: 40px;text-orientation: upright">SPORTS EVENT MANAGEMENT</h1>
	<link rel="stylesheet" type="text/css" href="site.css">
</head>

<body>
	<div class="topnav">
  <a href="./index.php">Home</a>
  <a href="./view.html">Back</a>
  <a href="./view.php">view registered</a>
 
  <a class="active" href="#registration">registration</a>
   <a href="./about.php">about</a>
  <a href="#logout">logout</a>
</div>
<h3 style="text-decoration-color: purple;text-align: center;"> welcome to sport event management..</h3>
<?php
	$db = mysqli_connect("localhost","root","","login");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = mysqli_real_escape_string($db,$_POST['sname']);
      $email= mysqli_real_escape_string($db,$_POST['email']);
      $mobileno = mysqli_real_escape_string($db,$_POST['mobileno']);
      $date = mysqli_real_escape_string($db,$_POST['dob']); 
      $gender = mysqli_real_escape_string($db,$_POST['gender']); 
      $cname = mysqli_real_escape_string($db,$_POST['cname']); 
      $address = mysqli_real_escape_string($db,$_POST['addr']); 
      $PostCode = mysqli_real_escape_string($db,$_POST['ptc']);
      $hidden = mysqli_real_escape_string($db,$_POST['id']);
      $userid=$_SESSION['id'];
      $status=0;
      $sql = "INSERT INTO `responses`(`gameid`, `username`, `email`, `dob`, `gender`, `cname`, `adress`, `post`, `status`, `userid`) VALUES ('$hidden','$name','$email','$date','$gender','$cname','$address','$PostCode','$status','$userid')";
      $result = mysqli_query($db,$sql);
      var_dump($result);
      var_dump($sql);
      if($result){
       header("Location: ./userview.php");
      }
  }else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(!isset($_SESSION['id'])){header("Location:./login.php");}
?>
	
			<div align="left" id="frm1">
				<form action="./student.php" method="post">
					<h3>User registration form</h3>
			Student Name*: <input type="text" name="sname" /><br/><br/>
			Email*:<input type="email" name="email" /><br /><br/>
			Mobile No*: <input type="text" name="mobileno" /><br /><br/>
			Date of Birth: <input type="date" name="dob" /><br /><br/>
			Gender:<input type="radio" name="gender" value="male" checked> Male
                   <input type="radio" name="gender" value="female"> Female<br><br>
			College Name*: <input type="text" name="cname" /><br /><br/>
			Address: <input type="text" name="addr" /><br /><br/>
			Post Code: <input type="text" name="ptc" /><br />
			<input type="hidden" name="id" value=<?php echo "\"".$_GET['id']."\""; ?>>
		<input type="submit" value="Submit" />
	</form>
		</div>
<p><strong>Note: Please make sure your details are correct before submitting form and that all fields marked with * are completed!.</strong></p>
<?php }?>
</body>
</html>