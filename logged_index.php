<!DOCTYPE html >
<html>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: white;
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
    width: 20%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

.deletebtn {
    background-color: #3b5998;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
/*    width: 20%;
*/    opacity: 0.9;
}

.deletebtn:hover {
    opacity: 1;
}

.logoutbtn {
    background-color: gray;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 40%;
    opacity: 0.9;
}

.logoutbtn:hover {
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



#friends {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#friends td, #friends th {
    border: 1px solid #ddd;
    padding: 8px;
}

#friends tr:nth-child(even){background-color: #f2f2f2;}

#friends tr:hover {background-color: #ddd;}

#friends th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<body>
<?php
session_start();

function redirect() {
    header('location:login.php');
}

if(!isset($_SESSION['username'])) {
    redirect();
} ?>
	<center>
	<table id="friends">
		<?php
			require('db_connect.php');
			// session_start();

			$username = $_SESSION['username'];
			echo "<h2> Hello, $username. Your friends are: </h2>";

			$query = "SELECT * FROM `friends` WHERE name1='$username'";
			$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>";
			    echo ($row['name2']);
			    echo "</td>";

			    echo "<td>";
			    echo "<form id='delete_friend' method='post' action='delete_friends.php'>
			    		<input type='hidden' name='friend' value=";
			    echo $row['name2'];
			    echo"><input type='submit' value='Delete friend' class='deletebtn'/> </form>";
			    echo "</td>";

			    echo "</tr>";
			}
			$query = "SELECT * FROM `friends` WHERE name2='$username'";
			$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>";
			    echo ($row['name1']);
			    echo "</td>";

			    echo "<td>";
			    echo "<form id='delete_friend' method='post' action='delete_friends.php'>
			    		<input type='hidden' name='friend' value=";
			    echo $row['name1'];
			    echo"><input type='submit' value='Delete friend' class='deletebtn'/> </form>";
			    echo "</td>";

			    echo "</tr>";
			}
		?>
	</table>
	<br>
	<h2> Add new friends </h2>
	<form id="add-friends" method="post" action="add_friends.php" >
		<label for="friend"><b>Friend name</b></label>
        <input type="text" name="friend" id="friend">
        <input type="submit" value="Add Friend" class = "registerbtn"/>
    </form>
</center>
<br>
<br>
<br>
<center>	<form action='logout.php'><input type='submit' value='Log out' class="logoutbtn"/></form></center>
</body>
</html>