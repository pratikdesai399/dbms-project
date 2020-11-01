<?php
    include("../include/connection.php");

    $id = $_POST['id'];
    $querry = "update doctor set status='Approved' where id='$id' ";
    $result = mysqli_query($connect, $querry);
    

?>