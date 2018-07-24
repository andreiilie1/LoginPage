<?php
	session_start();
	require('db_connect.php');
	$friend = $_POST['friend'];
	$name = $_SESSION['username'];

	$query = "DELETE FROM `friends` WHERE (name1 ='$friend' AND name2='$name') OR (name1 ='$name' AND name2='$friend') ";

	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

	header("location:logged_index.php");