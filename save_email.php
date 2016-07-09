<?php

if(!isset($_POST["email"]) || !isset($_POST["name"]) || $_POST["email"] == "" || $_POST["name"] == ""){
	echo '{"status":1, "message":"Name and Email required"}';
	exit();
}

$servername = "localhost";
$username = "umair053_store";
$password = "admin";
$dbname = "umair053_store";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id FROM users WHERE email='".$_POST["email"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '{"status":0, "message":"success"}';
} else {
    $sql = "INSERT INTO users (name, email)
	VALUES ('".$_POST["name"]."', '".$_POST["email"]."')";

	if ($conn->query($sql) === TRUE) {
		echo '{"status":0, "message":"success"}';
	} else {
		echo '{"status":1, "message":"'.$conn->error.'"}';
	}
}

$conn->close();
?>