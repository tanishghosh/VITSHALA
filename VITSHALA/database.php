<?php
	header('Location:http://localhost:1234/AccountCreate.html');
	

	$conn = mysqli_connect("localhost","root","","loginrecord");


	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	
    $name=false;
	$pass=false;
	if(isset($_POST['Name'])&& isset($_POST['Password']))
	{
		$name = $_POST['Name'];
		$pass=$_POST['Password'];
	} 	
	
	//$name= "'".$name."'";
	//$pass= "'".$pass."'";
	$name= mysqli_real_escape_string($conn,$name);
	$pass     = mysqli_real_escape_string($conn,$pass);
	
	
	$sql = "INSERT INTO login(Username,Password) VALUES ('$name','$pass')";


	if (mysqli_query($conn, $sql)) {
    echo "Account created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>