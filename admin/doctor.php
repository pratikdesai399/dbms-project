<?php
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Doctors</title>
</head>
<body>

        <?php
            include("../include/header.php");
            include("../include/connection.php");
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px">  
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10" style="">
                <h5 class="text-center">Total Doctors</h5>
                    <?php
                        $query = "select * from doctor where status='Approved' order by data_reg ASC";
                        $res = mysqli_query($connect, $query);
                        

                        $output = "";

                        $output .= '
                            <table class="table table-bordered">
                            <tr class="">
                                <th class="">ID</th>
                                <th class="">Firstname</th>
                                <th class="">Surname</th>
                                <th class="">Username</th>
                                <th class="">Gender</th>
                                <th class="">Phone</th>
                                <th class="">Country</th>
                                <th class="">Salary</th>
                                <th class="">Date Register</th>
                                <th class="">Action</th>
                            </tr>
                        ';

                        if(mysqli_num_rows($res) < 1){
                            $output .= '
                                <tr class="">
                                    <td colspan="8" class="text-center">No Job Request</td>
                                </tr>
                            ';
                        }

                        while($row = mysqli_fetch_array($res)){
                            $output .= "
                                <tr >
                                    <td>".$row['id']."</td>
                                    <td>".$row['firstname']."</td>
                                    <td>".$row['surname']."</td>
                                    <td>".$row['username']."</td>
                                    <td>".$row['gender']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$row['country']."</td>
                                    <td>".$row['salary']."</td>
                                    <td>".$row['data_reg']."</td>
                                    <td>
                                        <a href='' class=''>
                                            <button class='btn btn-success'>Edit</button>
                                        </a>
                                    </td>
                                
                            ";
                        }

                        $output .= "
                            </tr>
                            </table>
                        ";

                        echo $output;
                    ?>
                </div>  
            </div>
            </div>
        </div>

</body>
</html>