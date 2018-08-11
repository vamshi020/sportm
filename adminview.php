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
    <th>View Responses</th>
  </tr>
  <?php 
    $db = mysqli_connect("localhost","root","","login");
    $sql= "SELECT `SportsName`, `CollegeName`, `Location`, `date`,`id` FROM `addgame` WHERE 1";
    $result = mysqli_query($db,$sql);
    if ($result) {
      # code...
     while ($row=mysqli_fetch_row($result))
    {
      printf("<tr>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td><a href=\"./viewresp.php?id=%d\">Accept</a></td>
  </tr>",$row[0],$row[1],$row[2],$row[3],$row[4]);
    }
  }
  ?>
</table>

</body>
</html>