<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
</head>
<body>
    
    <?php 
        include("../include/header.php"); 
	    include("../include/connection.php");
        $doc = $_SESSION['doctor'];
        $query = "select * from doctor where username = '$doc'";
        $result = mysqli_query($connect, $query);

        while($row = mysqli_fetch_array($result)){
		    $username = $row['username'];
            $profiles = $row['profile'];
            $firstname = $row['firstname'];
            $lastname = $row['surname'];
            $email = $row['email'];
            // $department = $row['department'];
            $phone = $row['phone'];
            $salary = $row['salary'];
	    }

    ?>

    <div class="container-fluid">
        <di class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                        include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                        $doc = $_SESSION['doctor'];
                                        $query = "select * from dector where username = '$doc'";
                                        $result = $result = mysqli_query($connect, $query);

                                    ?>

                                    <form method="post">
                                        <?php
                                            echo "image"
                                        ?>
                                        <input type="file" name="img" class="form-control">
                                        <input type="submit" name="upload" class="btn btn-success">
                                    </form>

                                    <div class="my-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="2" class="text-center">Details</th>
                                            </tr>
                                            <tr>
                                                <td> Firstname</td>
                                                <td> <?php echo $firstname; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Surname</td>
                                                <td> <?php echo $lastname; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Username</td>
                                                <td> <?php echo $username; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Email</td>
                                                <td> <?php echo $email; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Phone</td>
                                                <td> <?php echo $phone; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Salary</td>
                                                <td> <?php echo $salary; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                  
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center"> Change Username</h5>
                                    <form method="post">
                                        <label>Change Username</label>
                                        <input type="text" name="username" class="form-control" autocomplete="off"
                                        placeholder="Enter Username">
                                        <br>
                                        <input type="submit" name="change_username" class="btn btn-success" value="Change Username">
                                    </form>
                                    <br><br>

                                    <h5 class="text-center my-2"> Change Password</h5>
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" name="old_pass" class="form-control" autocomplete="off"
                                            placeholder="Enter Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="new_pass" class="form-control" autocomplete="off"
                                            placeholder="Enter New Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_pass" class="form-control" autocomplete="off"
                                            placeholder="Enter Confirm Password">
                                        </div>
                                        <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>