<?php
    include("../include/connection.php");

    $id = $_POST['id'];
    $querry = "update doctor set status='Rejected' where id='$id' ";
    $result = mysqli_query($connect, $querry);

?>