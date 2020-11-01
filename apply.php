<?php

    include("include/connection.php");
    if(isset($_POST['apply'])){
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $password= $_POST['pass'];
        $confirm_password = $_POST['con_pass'];

        $error= array();
        if(empty($firstname)){
            $error['apply'] = "Enter First Name";
        }else if(empty($surname)){
            $error['apply'] = "Enter Surname";
        }else if(empty($username)){
            $error['apply'] = "Enter Username";
        }else if(empty($email)){
            $error['apply'] = "Enter email";
        }else if($gender == ""){
            $error['apply'] = "Enter gender";
        }else if(empty($phone)){
            $error['apply'] = "Enter Phone Number";
        }else if($country == ""){
            $error['apply'] = "Mention Country";
        }else if(empty($password)){
            $error['apply'] = "Enter Password";
        }else if(empty($confirm_password)){
            $error['apply'] = "Confirm Your Password";
        }else if($password != $confirm_password){
            $error['apply']= "Password did not match";
        }

        if(count($error) == 0){
                $query = "insert into doctor(firstname,surname,username,email,gender,phone,country,password,salary,data_reg,status,profile) 
                            VALUES ('$firstname','$surname','$username','$email','$gender','9823842981','$country','$password','120000','NOW()','Pending','docotr') ";
            $result = mysqli_query($connect, $query);
            if($result){
                echo $result;
                echo "<script>alert('You have successfully Applied')</script>";
                header("Loaction: docorlogin.php");
            }else{
                echo "<script>alert('Failed')</script>";
            }
        }
    }

    if(isset($error['apply'])){
        $s = $error['apply'];
        $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
    }else{
        $show="";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Apply</title>
</head>
<body >

        <?php
            include("include/header.php")
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 my-3 jumbotron">
                        <h5 class="text-center">Apply Now!!!</h5>
                        <div class="">
                            
                            <?php echo $show; ?>
                        </div>
                        <form method="post" class="">
                            <div class="form-group">
                                <label for="" class="">Firstname</label>
                                <input type="text" class="form-control" name="firstname" autocomplete="off" placeholder="Enter Firstname" 
                                value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Surname</label>
                                <input type="text" class="form-control" name="surname" autocomplete="off" placeholder="Enter Surname" 
                                value="<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="">UserName</label>
                                <input type="text" class="form-control" name="uname" autocomplete="off" placeholder="Enter Username" 
                                value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Email</label>
                                <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Enter Email"
                                 value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" >
                            </div>
                        
                            <div class="form-group">
                                <label for="" class="">Select Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="" class="">Select Gender</option>
                                    <option value="male" class="">Male</option>
                                    <option value="female" class="">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="">Phone</label>
                                <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="Enter Phone Number"
                                 value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="" class="">Select Country</label>
                                <select name="country" id="" class="form-control">
                                    <option value="" class="">Select Country</option>
                                    <option value="india" class="">India</option>
                                    <option value="other" class="">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="">Password</label>
                                <input type="password" name="pass" class="form-control" placeholder="Enter Password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Confirm Password</label>
                                <input type="password" name="con_pass" class="form-control" placeholder="Confirm Your Password" autocomplete="off">
                            </div>
                            <input type="submit" name="apply"  value="Apply Now" class="btn btn-success">
                            <p class="">I already have an account <a href="doctorlogin.php" class="">Click Me</a></p>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
</body>
</html>