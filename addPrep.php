<link rel="stylesheet" href="style.css" type="text/css">
<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","furbeyre-db","9OolCETjSlfkDUDF","furbeyre-db");
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
if(!($stmt = $mysqli->prepare("INSERT INTO prep(pName, pEffort, pNotes) VALUES (?,?,?)"))){
	echo "Prepare error: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("sds",$_POST['pName'],$_POST['pEffort'],$_POST['pNotes']))){
	echo "Bind error: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute error: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added Prep";
}
?>
