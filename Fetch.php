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
	
	if(isset($_POST['CheckID'])){
		$val = $_POST['CheckID'];
		
		$result = $mysqli->query("SELECT * FROM users WHERE userid = '$val'");
		
		if(mysqli_fetch_row($result)){//user with that id was found
			echo "True";
		}else{//query returned nothing
			echo "False";
		}
	}
	
	//$result = $mysqli->query("SELECT * FROM users");
	if(isset($_GET['USERID'])){
		$val = $_GET['USERID'];
		$result = $mysqli->query("SELECT * FROM users,address WHERE users.userid = address.userid AND users.userid = '$val'");
		
		if(!$result){
			echo "<p> query failed</p>";
			die(mysqli_error());
		}
		
		$arr = array();
		while($row = mysqli_fetch_row($result)){
			$arr[] = $row;
		}	
		
		//pull out each value since arr's 1st 
		//indice holds the entire json object currently
		$JSON = array();
		foreach($arr as $row){
			foreach($row as $value){
			array_push($JSON, $value);
			}
		}
		
		$mysqli->close();
		echo json_encode($JSON);
	}
?>