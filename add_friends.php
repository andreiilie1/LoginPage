<?php
session_start();
require('db_connect.php');
if (isset($_POST['friend'])){
	$friend = $_POST['friend'];
	$name = $_SESSION['username'];
	print $friend;
	print $name;

	$query = "SELECT * FROM `user_login` WHERE username='$friend'";

	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);

	if($count >=1) {

		$sql = "INSERT INTO friends (name1, name2)
	        VALUES (?,?)";

	    $stmt = mysqli_prepare($connection, $sql);

	    $stmt->bind_param("ss", $name, $friend);

	    $stmt->execute();
	}
    header("location:logged_index.php");
}