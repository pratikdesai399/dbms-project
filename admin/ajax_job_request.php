<?php
    include("../include/connection.php");

    $query = "select * from doctor where status='Pending' order by data_reg ASC";
    $res = mysqli_query($connect, $query);

    $output = "";

    $output .= '
        <table class="table table-bordered">
        <tr class="">
            <th class="">ID</th>
            <th class="">Firstname</th>
            <th class="">Surname</th>
            <th class="">Username</th>
            <th class="">Email</th>
            <th class="">Gender</th>
            <th class="">Phone</th>
            <th class="">Country</th>
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
                <td>".$row['email']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['country']."</td>
                <td>".$row['data_reg']."</td>
                <td>
                    <divclass='col-md-12'>
                        <div class='row'>
                            <div class='col-md-6'>
                                <button id='".$row['id']."' class='btn btn-success approve'>Approve</button>
                            </div>
                            <div class='col-md-6'>
                                <button id='".$row['id']."' class='btn btn-danger reject'>Reject</button>
                            </div>
                        </div>
                    </div>
                </td>
            
        ";
    }

    $output .= "
        </tr>
        </table>
    ";

    echo $output;
?>