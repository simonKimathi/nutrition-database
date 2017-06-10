<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","furbeyre-db","9OolCETjSlfkDUDF","furbeyre-db");
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}


if(!($stmt = $mysqli->prepare("UPDATE food SET ? = ? WHERE fName = ?"))){
	echo "Prepare error: "  . $stmt->errno . " " . $stmt->error;
}

#$_POST['vToUpdate'],$_POST['aToUpdate'],

if(!($stmt->bind_param("sss", $_POST['aToUpdate'], $_POST['vToUpdate'], $_POST['fToUpdate']))){
echo "Bind error: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute error: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Updated " . $_POST['fToUpdate'] . " - " . $_POST['aToUpdate'] . " to " . $_POST['vToUpdate'];
}
?>
<form method="POST" action="mainPage.php">
		<p><input type="submit" value="Return" /></p>
</form>