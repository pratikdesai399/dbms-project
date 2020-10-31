<?php
    session_start();
    include("../include/header.php");
    include("../include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
</head>
<body>
    <div class="container-fluid" >
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-2" style="margin-left: -30px;">
                        <?php 
                        include("sidenav.php"); ?>
                </div>

                <div class="col-md-10">
                    <h5 class="my-2">DOCTOR DASHBOARD</h5>
                    
                    <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    //  $ad = mysqli_query($connect,"select * from admin");
                                    //  $num = mysqli_num_rows($ad); 
                                    ?>
                                    <!-- <h5 class="my-2 text-white " style="font-size: 30px;"><?php echo $num ?></h5> -->
                                    <h5 class="text-white">Total Appointments</h5>
                                </div>
                                        <!-- <div class="col-md-4"> -->
                                            <!-- <a href="admin.php"><i class="fa fa-user-cog fa-3x my-4" style="color: white;"></i></a>											 -->
                                        <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

</body>
</html>