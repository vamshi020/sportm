<?php 
  session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
   <!--
      // Form validation code will come here.
      function validate()
      {
      
         if( document.myForm.username.value == "" )
         {
            alert( "Please provide your username!" );
            document.myForm.username.focus() ;
            return false;
         }
         
         if( document.myForm.password.value == "" )
         {
            alert( "Please provide your Email!" );
            document.myForm.password.focus() ;
            return false;
      }
   //-->
</script>
	<title>admin login page</title>
<link rel="stylesheet" type="text/css" href="site.css">
		<h1 style="color:purple;text-align:center;background-color: orange;">SPORTS EVENT MANAGEMENT</h1>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
      //Get value from form in login.php file
      session_start();
      $username=$_POST['user'];
      $password=$_POST['pass'];
      
      $db = mysqli_connect("localhost","root","","login");
      //to prevent mysql injection
      $username= stripcslashes($username);
      $password= stripcslashes($password);
      $username= mysqli_real_escape_string($db,$username);
      $password= mysqli_real_escape_string($db,$password);

      //connect to the server and select database

   // Querry the database for user
   $sql= "SELECT `collagename` FROM `admin` WHERE `username`='$username' AND `password`= '$password'";
    $result = mysqli_query($db,$sql);
   
    if($result){
    if (mysqli_num_rows($result) > 0){
      $row=mysqli_fetch_row($result );
      echo "Login success!!! welcome".$row[0];
       header("Location:./add.php");
die();
    }
    else{
      echo "Failed to login";
    }
}
}else{
 ?>
	<div class="topnav">
		<a  href="./index.php">Home</a>
  <a class="active" href="./admin.php">ADMIN</a>
  <a href="./view.php">ViewSports</a>
  </div> 
	<div id="frm">
		
		<head>Admin login</head>
		
			<form action="./admin.php" name="myForm" method="post" onsubmit="return(validate());" autocomplete="on">
			<p>
				<label>Admin:</label>
				<input type="text" name="user" placeholder="Enter username" required="required" minlength="3" maxlength="30" />
			</p>
			<p>
				<label>password:</label>
				<input type="password" name="pass" placeholder="Enter password" required="required" minlength="3" maxlength="30" />
			</p>
			<p> 
 			 <button  type="submit" value="LogIn"><a href="./add.html"></a>Login</button>
			</p>
		</form>
	</div>
	<?php 
	{}	}
	?>
	</body>
</html>
