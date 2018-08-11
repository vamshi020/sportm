<?php 
  session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>view games</title>
<h1 style="color:orange;text-align:center; text-indent: 40px;text-orientation: upright">SPORTS EVENT MANAGEMENT</h1>

	<link rel="stylesheet" type="text/css" href="site.css">
</head>
<p><?php if(isset($_SESSION['username']))
echo"welcome ".$_SESSION['username'];?></p>
<body>
	<div class="topnav">
  <a  href="./index.php">Home</a>
   <a class="active" href="./uregisterd.php">viewSports</a>
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
    <th>View Responses</th>
  </tr>
  <?php 
    $db = mysqli_connect("localhost","root","","login");
    $sql= "SELECT `SportsName`, `CollegeName`, `Location`, `date`,`id` FROM `addgame` WHERE 1 ORDER BY `date` DESC";
    $result = mysqli_query($db,$sql);
     while ($row=mysqli_fetch_row($result))
    {
      printf("<tr>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td><a href=\"./student.php?id=%d\">Register Here</a></td>
  </tr>",$row[0],$row[1],$row[2],$row[3],$row[4]);
    }
  ?>
</table>

</body>
</html>