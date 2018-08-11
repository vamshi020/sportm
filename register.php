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
	<title>Signup</title>
	<h1 style="color:orange;text-align:center; text-indent: 40px;text-orientation: upright">SPORTS EVENT MANAGEMENT</h1>
	<link rel="stylesheet" type="text/css" href="site.css">
</head>
<body>
	<div class="topnav">
  <a  href="./index.php">Home</a>
  <a href="./login.php">Back</a>
  <a  <a class="active" href="./register.php">SingUp</a>
</div>
<?php

   $db = mysqli_connect("localhost","root","","login");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $Name = mysqli_real_escape_string($db,$_POST['Name']);
      $mail= mysqli_real_escape_string($db,$_POST['mail']);
      $password = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "INSERT INTO `user`(`Name`, `email`, `password`) VALUES ('$Name','$mail','$password')";
      $result = mysqli_query($db,$sql);
    if($result){
        header("Location:./student.php");
      die();
    }else{
    echo "registration failed";
  }
}else{
?>
<form   action=".\register.php" name="myForm" method="post" onsubmit="return(validate());" autocomplete="on">
	<div align="left" id="frm1">
    <h5 <p style="color:red;"><p>*plzz singup with your google acount</p> </h5>
				<form>
					<h3>signup </h3>
          Name: <input type="Name" name="Name" placeholder="Enter Name" required="required" minlength="3" maxlength="30" /><br/><br/>
			Mail: <input type="mail" name="mail" placeholder="Enter Email" required="required" minlength="3" maxlength="30" /><br/><br/>
			Password:<input type="password" name="pass" placeholder="Enter password" required="required" minlength="3" maxlength="30"> <br /><br/>
			Confirm Password: <input type="password" name="pass" placeholder="Enter confirm password" required="required" minlength="3" maxlength="30" ></br><br/>
		<input type="submit" value="SignUp" />
		<p>Already an acount?<a href="./login.php">Signin</a></p>
		</div>
  </form>
  <?php } ?>
</body>
</html>