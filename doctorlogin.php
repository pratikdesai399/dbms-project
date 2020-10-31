<?php
    session_start();
    include("include/connection.php");

    if(isset($_POST['login'])){
        $username = $_POST['uname'];
	    $password = $_POST['pass'];   
        
        $error = array();

        if(empty($username)){
            $error['doctor'] = "ENTER USERNAME";
        }else if(empty($password)){
            $error['doctor'] = "ENTER PASSWORD";
        }

        if(count($error)==0){
            $query = " select * FROM doctor WHERE username = '$username' and password = '$password'";
            $result = mysqli_query($connect, $query);
            
            if(mysqli_num_rows($result)==1){
                echo "<script>alert('ADMIN LOGGED IN SUCCESSFULLY')</script>";
                $_SESSION['doctor'] = $username;
                header("Location:doctor/index.php");
            }
            else{
                echo "<script>alert('INVALID CREDENTIALS!!')</script>";
            }
        }
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
        <form method="post" class="m-2">
            <?php
                if(isset($error['doctor'])){
                    $sh = $error['doctor'];
                    $show = "<h4 class='alert alert-danger'>ENTER CREDENTIALS</h4>";
                }
                else{
                    $show = "";
                }
                echo $show;
            ?>

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