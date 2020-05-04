<?php
include_once('function.php');
$uusername=new DB_con();

session_start();
if(strlen($_SESSION['uid'])=="")
{
  header('location:logout.php');
} else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registraion using PHP OOPs Concept</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assests/style.css" rel="stylesheet">
    <script src="assests/jquery-1.11.1.min.js"></script>
    <script src="assests/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
</head>
<body>
<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="" align="center">Welcome Back : <?php  echo  $_SESSION['fname'];?> <a href="profile.php">Profile</a></legend>  
	  <a href="addCustomer.php" class="btn btn-success" type="submit" name="signin">Add Customer</a>
	  <a href="logout.php" class="btn btn-success" type="submit" name="signin">Logout</a>
    </div>

    

  </fieldset>
</form>



<div class="control-group" align="center">
      <!-- Button -->
	  <?php
					// echo '<pre>';
					// print_r($uusername->fetchdata('tblusers'));
			?>
      <div class="controls">
			<table class="table">
			  <tr>
				<th width="9%" height="42" scope="col" >S no.</th>
				<th width="13%" scope="col">FullName</th>
				<th width="11%" scope="col">UserEmail</th>
				<th width="11%" scope="col">RegDate</th>
				<th width="11%" scope="col">Action</th>
			  </tr>
			  
			  <?php  
				$results = $uusername->fetchdata('tblusers');
					$i = 1;
					foreach($results as $result){ ?>
					<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><?php echo $result['FullName']; ?></td>
					<td><?php echo $result['UserEmail']; ?></td>
					<td><?php echo $result['RegDate']; ?></td>
					<td><a type="button" href="edituser.php?id=<?php echo $result['id']; ?>" class="btn btn-info">Edit</a><button data-id="<?php echo $result['id']; ?>" type="button" class="btn btn-danger deleteuser">Delete</button></td>
					</tr>
				<?php } ?>
			  </table>
			
      </div>
    </div>
	<script src="assests/custom.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
<?php } ?>