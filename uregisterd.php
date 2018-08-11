<!DOCTYPE html>
<html>
<head>
	<title>view games</title>
<h1 style="color:orange;text-align:center; text-indent: 40px;text-orientation: upright">SPORTS EVENT MANAGEMENT</h1>

	<link rel="stylesheet" type="text/css" href="site.css">
</head>
<body>
	<div class="topnav">
  <a  href="./index.php">Home</a>
  <a class="active" href="./viewresp.php">viewSports</a>
  <a href="./about.html">About</a>
  <a href="./index.php">Logout</a>
  
</div>
<?php 
$db = mysqli_connect("localhost","root","","login");
?>
<table>
  <tr>
    <th>Sports Name</th>
    <th>College Name</th>
    <th>Location</th>
    <th>Date</th>
    <th>Status</th>
  </tr>
  <?php 
  session_start();
    $db = mysqli_connect("localhost","root","","login");
    $temp=$_SESSION['id'];
    $sql1="SELECT  `gameid`,`status` FROM `responses` WHERE `userid`='$temp' ORDER BY `id` DESC";
    $result1=mysqli_query($db,$sql1);
    if ($result1)
      if(mysqli_num_rows($result1)>0){
     while ($row1=mysqli_fetch_row($result1))
      {
        $i=$row1[0];
        $sql= "SELECT `SportsName`, `CollegeName`, `Location`, `date`FROM `addgame` WHERE `id`='$i'";
        $result = mysqli_query($db,$sql);
        if ($result)
         while ($row=mysqli_fetch_row($result))
        {
          printf("<tr>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
      </tr>",$row[0],$row[1],$row[2],$row[3],$a=($row1[1]==1)?"Accepted":"Pending");
        }
      }
    }else{
      header("Location:./userview.php");
    }
  ?>
</table>

</body>
</html>