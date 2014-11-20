<!DOCTYPE html>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "test";
					//server location, username, password, database
	$mysqli = new mysqli($servername, $username, $password, $db)
		or die("Connection Failed");
	if(!$mysqli){
		echo "<p>Connection Failed</p>";
	}
	
	//Which table to select from
	$result = $mysqli->query("SELECT * FROM users");

	if(!$result){
		echo "<p> query failed</p>";
		die(mysqli_error());
	}
	
	$arr = array();
	while($row = mysqli_fetch_row($result)){
		$arr[] = $row;
	}	
	json_encode($arr);
	
	$mysqli->close();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>UserListing</title>
		<script type="text/javascript" src="JQUERY.js"></script>
		<style type="text/css">
			input{
				width:100px;
			}
			th{
				text-align:left;
			}
			table{
				border-radius: 5px; 
				border: 5px solid black;
				background-color: lightblue;
				padding: 0;
				margin: 0 auto;
			}
		</style>
		</head>
	<body style="background-color: forestgreen">
		<h2 style="text-align:center;">UserListings</h2>
		<table>
		<form attribute="post" action="AddEditUser.php" method="post">
			<tr><td><input type="submit" id="new-user" name="new-user" value="Add User"></td></tr>
			</form>
			<tr><th></th><th> UserId</th><th> FirstName</th><th> LastName</th><th> Email</th>
				<th> Phone</th><th> Address</th><th> Date-Added</th><th> Sex</th></tr>
				<?php
					foreach($arr as $ele){
						echo "<form attribute='post' action='AddEditUser.php' method='post'>
								<tr><td colspan='1'><input type='submit' id='edit-user' name='edit-user' value='Edit User'></td>
								<td colspan='1'><input type='text' id='userid' name='userid' value=$ele[0] readonly></td>
								<td colspan='1'><input type='text' id='fname' name='fname' value=$ele[1] readonly></td>
								<td colspan='1'><input type='text' id='lname' name='lname' value=$ele[2] readonly></td>
								<td colspan='1'><input style='width:200px;' type='text' id='email' name='email' value=$ele[3] readonly></td>
								<td colspan='1'><input type='text' id='phone' name='phone' value=$ele[4] readonly></td>
								<td colspan='1'><input style='width:200px;' type='text' id='address' name='address' value=$ele[5] readonly></td>
								<td colspan='1'><input type='text' id='add-date' name='add-date' value=$ele[6] readonly></td>
								<td colspan='1'><input type='text' id='sex' name='sex' value=$ele[7] readonly></td></tr>
							  </form>"; 
					}
				?>
		</form>
		</table>
	</body>
</html>