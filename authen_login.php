<?php  
 require('db_connect.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `user_login` WHERE username='$username' and Password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

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

    // Register user's name and ID
    // if ((!isset($_SESSION['name'])) && (!isset($_SESSION['user_id'])))  {
    //     $row = mysql_fetch_assoc($login_result);
    //     $_SESSION['name'] = $row['name'];
    //     $_SESSION['user_id'] = $row['user_id'];
    // }

    header("location:logged_index.php");
}
else{
	// echo "<script type='text/sjavascript'>alert('Invalid Login Credentials')</script>";
	header("location:login.php");
}
}
?>