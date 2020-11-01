<?php
    session_start();
    global $row;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
</head>
<body>
    
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Edit Doctor</h5>

                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $query = "select * from doctor where id='$id'";
                            $res = mysqli_query($connect, $query);
                            $row = mysqli_fetch_array($res);                        
                        }
                    ?>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">Doctor Details</h5>
                            <h6 class="my-3">ID : <?php echo $row['id']; ?></h6>
                            <h6 class="my-3">Firstname : <?php echo $row['firstname']; ?></h6>
                            <h6 class="my-3">Surname : <?php echo $row['surname']; ?></h6>
                            <h6 class="my-3">Username : <?php echo $row['username']; ?></h6>
                            <h6 class="my-3">Email : <?php echo $row['email']; ?></h6>
                            <h6 class="my-3">Phone : +91 <?php echo $row['phone']; ?></h6>
                            <h6 class="my-3">Gender : <?php echo $row['gender']; ?></h6>
                            <h6 class="my-3">Country : <?php echo $row['country']; ?></h6>
                            <h6 class="my-3">Date Register : <?php echo $row['data_reg']; ?></h6>
                            <h6 class="my-3">Salary : Rs.<?php echo $row['salary']; ?></h6>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Update Salary</h5>

                                <?php
                                    if(isset($_POST['update'])){
                                       $salary = $_POST['salary'];
                                       $q = "UPDATE doctor SET salary='$salary' where id='$id' ";
                                       mysqli_query($connect, $q);
                                    }
                                ?>

                            <form method="post" class="">
                                <label for="" class="">Enter Doctor's Salary:</label>    
                                <input type="number" class="form-control" name="salary" placeholder="Enter Salary" autocomplete="off" value="<?php echo $row['salary'] ?>">
                                <input type="submit" class="btn btn-info my-3" name="update" value="Update Salary">
                            </form>

                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>