<!DOCTYPE html>
<?php
	$title = "error";
	$AddUser = true;
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		if(isset($_POST['new-user'])){
			$title = "Add New User";
			$AddUser = true;
			}
		else if(isset($_POST['edit-user'])){
			$title = "Edit User";
			$AddUser = false;
			$UserID = $_POST['userid'];
			}
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title id="page-title"><?php echo $title; ?></title>
		<script type="text/javascript" src="JQUERY.js"></script>
		<?php
			if($AddUser){
				echo "<script type='text/javascript' src='AddUserJavascript.js'></script>";
			}else{
				echo "<script type='text/javascript' src='EditUserJavascript.js'></script>";
			}
		?>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	</head>
	<body style="background-color: forestgreen">
	<h2> <?php echo $title; ?></h2>
		<div style="text-align:center;">
				<table>
			<thead>
				<tr><th colspan="3">User Info</th></tr>
			</thead>
			<form id="MyForm" name="MyForm" method="post" attribute="post" action="UserListing.php">
				<tr><td>User ID:</td><td><input type="text" id="userid" name="userid" value="<?php if(!$AddUser){ echo $UserID;}?>" readonly></td></tr>
				<tr><td>First Name:</td><td><input type="text" id="fname" name="fname"></td></tr>
				<tr><td>Last Name:</td><td><input type="text" id="lname" name="lname"></td></tr>
				<tr><td>Email:</td><td><input type="text" id="email" name="email"></td></tr>
				<tr><td>Phone:</td><td><input type="text" id="phone" name="phone"></td></tr>
				<tr><td>Address:</td><td><input type="text" id="address" name="address"></td></tr>
				<tr><td>Date Added:</td><td><input type="text" id="add-date" name="add-date"></td></tr>
				<tr><td>Male:<input type="radio" id="Male" name="sex"></td><td>Female:<input type="radio" id="Female" name="sex"></td></tr>
				<tr>
					<?php 
						if($AddUser){
							echo "<td></td><td><input id='Create' name='Create' type='submit' style='width:100%;' value='Create User'></td>";
						}
						else{
							echo "<td><input id='delete-user' name='delete-user' type='submit' style='width:100%;' value='Delete User'></td>
									<td><input id='Update' name='Update' type='submit' style='width:100%;' value='Update User'></td>";
						}
					?>
				</tr>		 
				<tr><td></td><td><input id="Clear" type="reset" style="width:100%;" value="Clear Fields"></td></tr>
			</form>
		</table>
		</div>
	</body>
</html>