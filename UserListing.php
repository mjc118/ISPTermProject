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
	
	//holds message related to whether Sql call for user was successful
	$Success="";
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		if(isset($_POST['Create'])){
			$userid = validate_input($_POST['userid']);
			$fname = validate_input($_POST['fname']);
			$lname = validate_input($_POST['lname']);
			$email = validate_input($_POST['email']);
			$phone = validate_input($_POST['phone']);
			$street = validate_input($_POST['street']);
			$city = validate_input($_POST['city']);
			$state = validate_input($_POST['state']);
			$zip = validate_input($_POST['zip']);
			$addDate = validate_input($_POST['add-date']);
			$sex = validate_input($_POST['sex']);
			
			if($mysqli->query("INSERT INTO users VALUES ('$userid', '$fname', '$lname', '$email', '$phone', '$addDate', '$sex')") &&
			$mysqli->query("INSERT INTO address VALUES ('$userid', '$street', '$city', '$state', '$zip')")){
				$Success = "User Added Successfully!";
			}
			else{
				$Success = "Failed to Add User!";
			}
		}
		else if(isset($_POST['Update'])){
			$userid = validate_input($_POST['userid']);
			$fname = validate_input($_POST['fname']);
			$lname = validate_input($_POST['lname']);
			$email = validate_input($_POST['email']);
			$phone = validate_input($_POST['phone']);
			$street = validate_input($_POST['street']);
			$city = validate_input($_POST['city']);
			$state = validate_input($_POST['state']);
			$zip = validate_input($_POST['zip']);
			$addDate = validate_input($_POST['add-date']);
			$sex = validate_input($_POST['sex']);
			
			if($mysqli->query("UPDATE users SET fname='$fname', lname='$lname', email='$email', phone='$phone', addDate='$addDate', sex='$sex' WHERE userid='$userid'") &&
			$mysqli->query("UPDATE address SET street='$street', city='$city', state='$state', zip='$zip' WHERE userid='$userid'")){
				$Success = "Updated User Successfully!";
			}else{
				$Success = "Failed to Update User!";
			}
		}
		else if(isset($_POST['delete-user'])){
			$userid = validate_input($_POST['userid']);
			
			if($mysqli->query("DELETE users, address FROM users, address WHERE users.userid = address.userid AND users.userid = '$userid'")){
				$Success = "Successfully Deleted User!";
			}else{
				$Success = "Failed to Delete User!";
			}
		}
	}
	
	function validate_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	//Which table to select from
	//my table names are users, address
	//users columns are :userid, fname, lname, email, phone, addDate, sex
	//address columns are: userid, street, city, state, zip
	$result = $mysqli->query("SELECT * FROM users JOIN address ON users.userid = address.userid");

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
				<th> Phone</th><th> Street</th><th> City</th><th> State</th><th> Zip</th><th> Date-Added</th><th> Sex</th></tr>
				<?php
					foreach($arr as $ele){
						echo "<form attribute='post' action='AddEditUser.php' method='post'>
								<tr><td colspan='1'><input type='submit' id='edit-user$ele[0]' name='edit-user' value='Edit User'></td>
								<td colspan='1'><input style='width:65px;' type='text' id='userid' name='userid' value='$ele[0]' readonly></td>
								<td colspan='1'><input style='width:75px;' type='text' id='fname' name='fname' value='$ele[1]' readonly></td>
								<td colspan='1'><input style='width:80px;' type='text' id='lname' name='lname' value='$ele[2]' readonly></td>
								<td colspan='1'><input style='width:180px;' type='text' id='email' name='email' value='$ele[3]' readonly></td>
								<td colspan='1'><input style='width:80px;' type='text' id='phone' name='phone' value='$ele[4]' readonly></td>
								<td colspan='1'><input style='width:130px;' type='text' id='street' name='street' value='$ele[8]' readonly></td>
								<td colspan='1'><input type='text' id='city' name='city' value='$ele[9]' readonly></td>
								<td colspan='1'><input style='width:35px;' type='text' id='state' name='state' value='$ele[10]' readonly></td>
								<td colspan='1'><input style='width:50px;' type='text' id='zip' name='zip' value='$ele[11]' readonly></td>
								<td colspan='1'><input style='width:80px;' type='text' id='add-date' name='add-date' value='$ele[5]' readonly></td>
								<td colspan='1'><input style='width:50px;' type='text' id='sex' name='sex' value='$ele[6]' readonly></td></tr>
							  </form>"; 
					}
				?>
		</form>
		</table>
		<div style="text-align:center;">
			<?php
					echo $Success;
			?>
		</div>
	</body>
</html>