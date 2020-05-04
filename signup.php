<?php

include_once('function.php');
$userdata=new DB_con();
// if(isset($_POST['submit']))
// {
	
// $fname=$_POST['fullname'];
// $uname=$_POST['username'];
// $uemail=$_POST['email'];
// $pasword=md5($_POST['password']);

// $sql=$userdata->registration($fname,$uname,$uemail,$pasword);
// if($sql)
// {
// echo "<script>alert('Registration successfull.');</script>";
// echo "<script>window.location.href='signin.php'</script>";
// }
// else
// {
// echo "<script>alert('Something went wrong. Please try again');</script>";
// echo "<script>window.location.href='signin.php'</script>";
// }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registration using PHP OOPs Concept</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assests/style.css" rel="stylesheet">
    <script src="assests/jquery-1.11.1.min.js"></script>
    <script src="assests/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
 <script>
function checkusername(va) {
  $.ajax({
  type: "POST",
  url: "check_availability.php",
  data:'email='+va,
  success: function(data){
  $("#usernameavailblty").html(data);
  }
  });

}
</script>
</head>
<body>
<form  id="signupForm" class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend" align="center">
      <legend class="">User Registration using PHP OOPs Concept</legend>
    </div>

	<div class="control-group">
      <label class="control-label"  for="username">Fullname</label>
      <div class="controls">
        <input type="text" id="fullname" name="fullname" placeholder="" class="form-control" required="true">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" onblur="checkusername(this.value)" placeholder="" class="form-control" required="true">
		<span id="usernameavailblty"></span>
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="form-control" required="true">
      </div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="password">Confirm password</label>
      <div class="controls">
        <input type="password" id="confirm_password" name="confirm_password" placeholder="" class="form-control" required="true">
      </div>
    </div>
 

 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" id="submit" name="submit">Register</button>
      </div>
    </div>

	<div class="control-group">
      <div class="controls">
       Already registered <a href="index.php">Signin</a>
      </div>
    </div>

	</fieldset>
</form>
<script type="text/javascript">
</script>
<script src="assests/custom.js"></script>
</body>
</html>
