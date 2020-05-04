<?php

include_once('function.php');
$userdata=new DB_con();
if(isset($_POST['submit']))
{
	$inputData = array('fullname'=>$_POST['fullname'],'UserEmail'=>$_POST['email']);
	$target_dir = "assests/images/";
	$target_file = $target_dir . basename($_FILES["my_file"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if($imageFileType){
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}
			if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $target_file)) {
				$inputData['user_image'] = 'assests/images/'.basename( $_FILES["my_file"]["name"]);
			}
		}
	
	$sql=$userdata->insertData('tblusers',$inputData);
	if($sql)
		{
			echo "<script>window.location.href='welcome.php'</script>";
		}
}
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
<form  id="addCustomerForm" class="form-horizontal" action='' method="POST" enctype="multipart/form-data">
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
      <label class="control-label"  for="username">Image</label>
      <div class="controls">
        <img src="assests/images/cjqc9a1sg017kajfziimpg8zs-customer-rep-2x-fc261b9f.one-half.png" id="userimage" class="img-rounded" alt="Cinque Terre">
		<input type="file" name="my_file"  id="my_file" style="display: none;" onchange="readURL(this);" />
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
