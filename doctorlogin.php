<?php
    session_start();
    include("include/connection.php");

    if(isset($_POST['login'])){
        $username = $_POST['uname'];
	    $password = $_POST['pass'];   
        
        $error = array();

        $query1 = "select * from doctor where username='$username' and password='$password'";
        $result1 = mysqli_query($connect, $query1);
        $row = mysqli_fetch_array($result1);

        
        if(empty($username)){
            $error['login'] = "ENTER USERNAME";
        }else if(empty($password)){
            $error['login'] = "ENTER PASSWORD";
        }else if($row['status'] == "Pending"){
            $error['login'] = "Please wait for the admin to confirm"; 
        }else if($row['pending'] == "Rejected"){
            $error['status'] = "Try Again Later"; 
        }

        if(count($error)==0){
            $query = " select * FROM doctor WHERE username = '$username' and password = '$password'";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result)){
                echo "<script>alert('Done')</script>";
                $_SESSION['doctor'] = $username;
                header("Location:doctor/index.php");
            }else{
                $error['login'] = "Invalid Login";
                echo "<script>alert('Invalid Credentials!!')</script>";
            }
        }
    }

    if(isset($error['login'])){
        $l = $error['login'];
        $show = "<h5 class='text-center alert alert-danger'>'$l'</h5>";
    }else{
        $show = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
</head>
<body>
    <?php include("include/header.php")?>

    <div>
        <div>
            <?php echo $show;?>
        </div>
        <form method="post" class="m-2">
            <div class="form-group">
                <label>Username</label>
				<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="ENTER USERNAME">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="pass" class="form-control" placeholder="ENTER PASSWORD">
			</div>
			<input type="submit" name="login" class="btn btn-primary" >
            <p>I do not have an account <a href="apply.php">Apply Now!!!</a></p>
        </form>
    </div>
</body>
</html>