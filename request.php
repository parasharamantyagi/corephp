<?php
// include Function  file
include_once('function.php');
$uusername=new DB_con();
// $uname= $_POST["username"];	

if(isset($_POST['insertUser'])){
	if($_POST['fullname'] && $_POST['email'] && $_POST['password'])
	{
		$sql=$uusername->registration($_POST['fullname'],$_POST['email'],md5($_POST['password']));
		
		// return 'index.php';
		echo 'index.php';
	}
}


if(isset($_POST['deleteuser'])){
	$sql=$uusername->deleteDataFromId('tblusers',$_POST['id']);
	echo $sql;
}

// Calling function
// $sql=$uusername->emailavailblty($uname);
// $num=mysqli_num_rows($sql);
// if($num > 0)
// {
// echo "<span style='color:red'> Email already associated with another account .</span>";
 // echo "<script>$('#submit').prop('disabled',true);</script>";
// } else{
	
	// echo "<span style='color:green'> Email available for Registration .</span>";
 // echo "<script>$('#submit').prop('disabled',false);</script>";
// }