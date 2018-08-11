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
  <a class="active" href="./viewresp.php">viewRespond</a>
  <a href="./about.php">About</a>
  <a href="./index.php">Logout</a>
  
</div>
<?php 
$db = mysqli_connect("localhost","root","","login");
?>
<table>
  <tr>
    <th>User Name</th>
    <th>Email</th>
    <th>DOB</th>
    <th>Gender</th>
    <th>College Name</th>
    <th>Address</th>
    <th>Post</th>
    <th>Stutes</th>
    <th>accept</th>
  </tr>
  <?php 
  if( $_GET["id"]) {
    $db = mysqli_connect("localhost","root","","login");
    $d=$_GET['id'];
    $sql= "SELECT `username`, `email`, `dob`, `gender`, `cname`, `adress`, `post`, `status`, `userid` FROM `responses` WHERE `gameid`='$d'";
    if($result = mysqli_query($db,$sql)){
      while ($row=mysqli_fetch_row($result))
      {
        printf("<tr>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
    </tr>",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$a=($row[7]==1)?"accepted":"pending",$b=($row[7]==1)?"-":"<a href=\"./accept.php?id=".$row[8]."&gid=".$_GET["id"]."\">accept</a>");
      }
    }
  }
  ?>
</table>

</body>
</html>