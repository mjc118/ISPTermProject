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
			if(!$AddUser){
				echo "<script type='text/javascript' src='EditUserJavascript.js'></script>";
			}
		?>
		<script type='text/javascript' src='Validate.js'></script>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	</head>
	<body style="background-color: forestgreen">
	<h2> <?php echo $title; ?></h2>
		<div style="text-align:center;">
				<table>
			<thead>
				<tr><th colspan="3">User Info</th></tr>
			</thead>
			<form id="MyForm" name="MyForm" onsubmit="return IsFormValid();"method="post" attribute="post" action="UserListing.php">
				<tr><td>User ID:</td><td><input type="text" id="userid" name="userid" value="<?php if(!$AddUser){ echo $UserID;}?>" <?php if(!$AddUser){echo "readonly";}?>></td></tr>
				<tr><td>First Name:</td><td><input type="text" id="fname" name="fname" onchange="CheckFName();"></td></tr>
				<tr><td>Last Name:</td><td><input type="text" id="lname" name="lname" onchange="CheckLName();"></td></tr>
				<tr><td>Email:</td><td><input type="text" id="email" name="email" onchange="CheckEmail();"></td></tr>
				<tr><td>Phone:</td><td><input type="text" id="phone" name="phone" onchange="CheckPhone();"></td></tr>
				<tr><td>Street:</td><td><input type="text" id="street" name="street" onchange="CheckStreet();"></td></tr>
				<tr><td>City:</td><td><input type="text" id="city" name="city" onchange="CheckCity();"></td></tr>
				<tr><td>State:</td><td><input type="text" id="state" name="state" onchange="CheckState();"></td></tr>
				<tr><td>Zip:</td><td><input type="text" id="zip" name="zip" onchange="CheckZip();"></td></tr>
				<tr><td>Date Added:</td><td><input type="text" id="add-date" name="add-date" onchange="CheckDate();"></td></tr>
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