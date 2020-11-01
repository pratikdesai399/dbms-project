<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Request</title>
</head>
<body>
    <?php
        include("../include/header.php")
    ?>

    <div class="container-fluid">
        <div class="col-md-12" >
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my">Job Request</h5>
                    <div id="show" class=""></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            show();
            function show(){
                $.ajax({
                    url:"ajax_job_request.php",
                    method:"POST",
                    success:function(data){
                        $("#show").html(data);
                    }
                });
            }
        })
    </script>


</body>
</html>