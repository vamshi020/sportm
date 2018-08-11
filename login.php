<!DOCTYPE html>
<html>
<head><script type="text/javascript">
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
            alert( "Please provide your Pass!" );
            document.myForm.password.focus() ;
            return false;
      }
   //-->
</script>
	<title>Student login page</title>
	<h1 style="color:orange;text-align:center; text-indent: 40px;text-orientation: upright">SPORTS EVENT MANAGEMENT</h1>
	<link rel="stylesheet" type="text/css" href="site.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="topnav">
  <a  href="./index.php">Home</a>
  <a  <a class="active" href="./login.php">User</a>
  
</div>
	<?php 
  session_start();
  if(isset($_SESSION['username']))
  {
    header("location: userview.php");
  }else if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username=$_POST['mail'];
      $password=$_POST['pass'];
      $db = mysqli_connect("localhost","root","","login");
      
      //to prevent mysql injection
      $username= stripcslashes($username);
      $password= stripcslashes($password);
      $username= mysqli_real_escape_string($db,$username);
      $password= mysqli_real_escape_string($db,$password);

      //connect to the server and select database

   // Querry the database for user
   $sql= "SELECT `name`,`id` FROM `user` WHERE `email`='$username' and `password`='$password'";
    $result = mysqli_query($db,$sql);
   
    if($result){
      if (mysqli_num_rows($result) > 0){
        $row=mysqli_fetch_row($result );
        echo "Login success!!! welcome".$row[0];
        $_SESSION['username'] = $row[0];
        $_SESSION['id']=$row[1];
         header("Location:./uregisterd.php");
        die();
      }
      else{
        goto a;
        echo "<>login failed <a href='./login.php'>click here</a> to try again";

      }
    }
else{
echo"database connection failed";
}
}else{
  $q=0;
  if(0){ 
      a:
      $q=1;
    }
?>
	<div id="frm">
		<head>Student Login</head>
    
			<form   action="./login.php" name="myForm" method="post" onsubmit="return(validate());" autocomplete="on">
        <?php if($q){ 
      ?><p color='red'>Wrong password or mail</p><?php
    }?>
			<p>
				<label>Mail:</label>
				<input type="mail" name="mail" placeholder="Enter mail" required="required" minlength="3" maxlength="30" />
			</p>
			<p>
				<label>password:</label>
				<input type="password" name="pass" placeholder="Enter password" required="required" minlength="3" maxlength="30" />
			</p>
			<p> 
 			 <button input  type="submit" value="LogIn">Login</button>
 			<p>If you don't have an acount?<a href="./register.php">SignUp</a>
			</p>
		</form>
	</div>
	</div>
	<?php } ?>
	</body>
</html>
