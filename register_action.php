<?php
require('db_connect.php');

if (isset($_POST['username']) and isset($_POST['psw'])){
	$username = $_POST['username'];
	$password = $_POST['psw'];

	$sql = "INSERT INTO user_login (Password, username)
        VALUES (?,?)";

    $stmt = mysqli_prepare($connection, $sql);

    $stmt->bind_param("ss", $_POST['psw'], $_POST['username']);

    $stmt->execute();

	session_start();

 	if (!isset($_SESSION['is_logged_in'])) {
        $_SESSION['is_logged_in'] = 1;
    }

    if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = $username;
    }
    if (!isset($_SESSION['password'])) {
        $_SESSION['password'] = $password;
    }

    header("location:logged_index.php");
}
?>