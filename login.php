<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "herossoul";

$loginUsername = $_POST["username"];
$loginPassword = $_POST["password"];
$version = $_POST["version"];
$serverversion = "0.0.1";



if($version != $serverversion){
	die("2");
}


$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error)
{
	die("conection failed : " . $conn->connect_error); // error code#1 = conection with database fail
}


$sql = "SELECT ac_password FROM accounts WHERE ac_username = '" . $loginUsername . "';";

$result = $conn->query($sql);

if($result->num_rows > 0){


	while ($row = $result->fetch_assoc()) {
		if(password_verify($loginPassword, $row["ac_password"])){
			die("0");
		}else{
			die("1");

		}
	}
}else{
	die("1");
}

$conn->close();
?>