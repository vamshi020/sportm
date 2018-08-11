<?php 
  session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>adding game by admin</title>
	<h1 style="color:orange;text-align:center; text-indent: 40px;text-orientation: upright">SPORTS EVENT MANAGEMENT</h1>

	<link rel="stylesheet" type="text/css" href="site.css">
</head>
<body>
<?php

   $db = mysqli_connect("localhost","root","","login");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $SportsName = mysqli_real_escape_string($db,$_POST['sname']);
      $CollegeName= mysqli_real_escape_string($db,$_POST['cname']);
      $Location = mysqli_real_escape_string($db,$_POST['Location']);
      $date = mysqli_real_escape_string($db,$_POST['date']); 
      $SportsDetails = mysqli_real_escape_string($db,$_POST['sdetails']); 
      $Address = mysqli_real_escape_string($db,$_POST['add']); 
      $PostCode = mysqli_real_escape_string($db,$_POST['ptc']);
      $sql = "INSERT INTO `addgame`(`SportsName`, `CollegeName`, `Location`, `date`, `SportsDetails`, `Address`, `PostCode`)  VALUES ('$SportsName','$CollegeName','$Location','$date','$SportsDetails','$Address','$PostCode')";
      $result = mysqli_query($db,$sql);
      if($result){
       header("Location:./adminview.php");
      }
  else
   {
  echo "registration failed";
  echo $sql;
   }
}else{
?>
	<div class="topnav">
  <a  href="./index.php">Home</a>
  <a class="active" href="./add.php">AddingGame</a>
  <a href="./adminview.php">viewresponds</a>
  <a href="#logout">logout</a>
</div>
	<div align="left" id="frm1">
				<form action=".\add.php" name="myForm" method="post" onsubmit="return(validate());" autocomplete="on">
					<h3><b>Adding game by admin</b></h3>
			Sports Name: <input type="text" name="sname" placeholder="Enter Sports Name" required="required" minlength="3" maxlength="50" /><br/><br/>

			College Name:<input type="textarea" name="cname" placeholder="Enter College Name" required="required" minlength="3" maxlength="100" /><br/><br/>

			Location: <input type="textarea" name="Location"  placeholder="Enter Location" required="required" minlength="3" maxlength="50" /><br/><br/>

			Date: <input type="date" name="date" /><br /><br/>

			Sports Details: <input type="textarea" name="sdetails" placeholder="Enter Sports Details" required="required" minlength="3" maxlength="50" /><br/><br/>

			Address: <input type="address" name="add" placeholder="Enter Address" required="required" minlength="3" maxlength="260" /><br/><br/>

			Post Code: <input type="postcode" name="ptc" minlength="3" maxlength="6" /><br/><br/><br/>
      
		<button type="submit" value="submit"><a href="./add.html"></a>Submit</button>
		<input type="Reset" value="Reset" />
	</form>
		</div>
    <?php }?>
</body>
</html>

