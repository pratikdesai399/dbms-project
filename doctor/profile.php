<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
</head>
<body>
    
    <?php include("../include/header.php"); 
	include("../include/connection.php");
    $doc = $_SESSION['doctor'];
    $query = "select * from doctor where username = '$doc'";
    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($res)){
		$username = $row['username'];
		$profiles = $row['profile'];
	}

    ?>

    

</body>
</html>