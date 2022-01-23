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

$sql = "SELECT ac_username FROM accounts WHERE ac_username = '" . $loginUsername . "';";

$result = $conn->query($sql);

$enPassword = password_hash($loginPassword, PASSWORD_DEFAULT);	

if ($result->num_rows > 0) {
   die("0");
} else {
//AÑADIR FECHA DE CREACION, BOOL DE SI ESTA ACTIVA ACTIVACION POR MAIL,....
  	$sql2 = "INSERT INTO accounts (ac_username, ac_password) VALUES ('" . $loginUsername . "', '" . $enPassword . "')";
}

if($conn->query($sql2) === TRUE) {
echo "OK";
}else {
echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();

?>

