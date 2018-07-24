

<!DOCTYPE html >
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LOGIN</title>
<!-- <link rel="stylesheet" type="text/css" href="style.css">
 --></head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: black;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>

<body id="body_bg">
<?php
session_start();

function redirect() {
    header('location:logged_index.php');
}

if(isset($_SESSION['username'])) {
    redirect();
} ?>
<div class="container">

<h1>Login</h1>
    <form id="login-form" method="post" action="authen_login.php" >
        <table border="0.5" >
            <tr>
                <label for="username"><b>Username</b></label>
                <input type="text" name="user_id" id="user_id">
            </tr>
            <tr>
                <label for="user_pass"><b>Password</b></label>
                <input type="password" name="user_pass" id="user_pass"></input>
            </tr>
			
            <tr>
				
                <input type="submit" value="Submit" class = "registerbtn"/>
<!--                 <td><input type="reset" value="Reset"/ class = "registerbtn">
 -->				
            </tr>
        </table>
    </form>
		</div>

  <div class="container signin">
    <p>New to our website? <a href="register.php">Create new account</a>.</p>
  </div>
</body>
</html>

