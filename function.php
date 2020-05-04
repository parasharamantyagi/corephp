<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'core_php');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}

// for username availblty
public function emailavailblty($uname) {
$result =mysqli_query($this->dbh,"SELECT UserEmail FROM tblusers WHERE UserEmail='$uname'");
return $result;

}

// Function for registration
	public function registration($fname,$uemail,$pasword)
	{
	$ret=mysqli_query($this->dbh,"insert into tblusers(FullName,UserEmail,Password,role) values('$fname','$uemail','$pasword','1')");
	return $ret;
	}
	
	public function fetchdata($tablename)
	{
		$query =mysqli_query($this->dbh,"select * from $tablename WHERE role = '0'");
		
		while($row=mysqli_fetch_assoc($query))
		{
			$result[] = $row;
		}
		
		return $result;
	}
	
	public function getDataFromId($tablename,$id) {
		$query =mysqli_query($this->dbh,"select * FROM $tablename WHERE id = '$id'");
		$row = mysqli_fetch_assoc($query);
		return $row;
	}
	
	public function insertData($tablename,$data) {
		
		$data = array_filter($data);
		$key = array_keys($data);
		$val = array_values($data);
		
		$query = "INSERT INTO $tablename (" . implode(', ', $key) . ") ". "VALUES ('" . implode("', '", $val) . "')";
		$result =mysqli_query($this->dbh,$query);
		return $result;
	}
	
	public function updateDataFromId($tablename,$id,$data) {
		
		$cols = array();
		foreach($data as $key=>$val) {
			$cols[] = "$key = '$val'";
		}
		$sql = "UPDATE $tablename SET " . implode(', ', $cols) . " WHERE id = '$id'";
		$result =mysqli_query($this->dbh,$sql);
		return($result);
	}
	
public function deleteDataFromId($tablename,$id) {
	$result =mysqli_query($this->dbh,"DELETE FROM $tablename WHERE id = '$id'");
	return $result;

}
	

// Function for signin
public function signin($uname,$pasword)
	{
	$result=mysqli_query($this->dbh,"select id,FullName from tblusers where UserEmail='$uname' and Password='$pasword' and role='1'");
	return $result;
	}


}
?>