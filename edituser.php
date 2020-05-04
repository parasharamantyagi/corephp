<?php

include_once('function.php');
$userdata=new DB_con();

$userData = $userdata->getDataFromId('tblusers',$_GET['id']);
// print_r();
if(isset($_POST['submit']))
{
	$sql=$userdata->updateDataFromId('tblusers',$_GET['id'],array('fullname'=>$_POST['fullname'],'UserEmail'=>$_POST['email']));
	if($sql)
	{
	echo "<script>alert('User update successfull.');</script>";
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
<form  id="updateUser" class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend" align="center">
      <legend class="">User Registration using PHP OOPs Concept</legend>
    </div>

	<div class="control-group">
      <label class="control-label"  for="username">Fullname</label>
      <div class="controls">
        <input type="text" id="fullname" name="fullname" placeholder="" value="<?php echo $userData['FullName']; ?>" class="form-control" required="true">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" onblur="checkusername(this.value)" value="<?php echo $userData['UserEmail']; ?>" placeholder="" class="form-control" required="true">
		<span id="usernameavailblty"></span>
      </div>
    </div>
 
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" id="submit" name="submit">Update</button>
      </div>
    </div>

	<div class="control-group">
      <div class="controls">
       <a href="welcome.php">Back</a>
      </div>
    </div>

	</fieldset>
</form>
<script type="text/javascript">
</script>
<script src="assests/custom.js"></script>
</body>
</html>
