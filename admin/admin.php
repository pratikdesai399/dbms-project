<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	include("../include/header.php");

	 ?>


	 <div class="container-fuid">
	 	

	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left: -30px">
	 				<?php 
	 				include("sidenav.php");
	 				include("../include/connection.php");

	 				 ?>

	 			</div>
	 			<div class="col-md-10">
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">
	 							<h5 class="text-center">All Admins</h5>

	 							<?php 
	 							$ad = $_SESSION['admin'];

	 							$query = "select * from admin where username !='$ad'";
	 							$res = mysqli_query($connect,$query);

	 							$output="<table class='table table-bordered'>
	 								<tr>
	 								<th>ID</th>
	 								<th>Username</th>
	 								<th style='width: 10%'>Action</th>
	 								<tr>";

	 							if(mysqli_num_rows($res) < 1){
	 								$output .= "<tr><td colspan='3' class='text-center'>No New Admin</td></tr>";
	 							}
	 							while($row = mysqli_fetch_array($res)){
	 								$id = $row['id'];
	 								$username = $row['username'];

	 								$output .= "<tr>
	 									<td>$id</td>
	 									<td>$username</td>
	 									<td>
	 										<a href='admin?id=$id'><button id='$id' class='btn btn-danger remove'>Remove</button></a>
	 									</td>";
	 							}

	 							$output.="</tr></table>";

	 							

	 							echo $output;


	 							if (isset($_GET['id'])) {
	 								$id = $_GET['id'];

	 								$query = "delete from admin where id = '$id'";
	 								mysqli_query($connect,$query);
	 							}


	 							 ?>





	 							

	 								
	 								



	 						</div>
	 						<div class="col-md-6">

	 							<?php if(isset($_POST['add'])){
	 								$uname = $_POST['uname'];
	 								$pass = $_POST['pass'];
	 								$image = $_FILES['img']['name'];

	 								$error = array();

	 								if(empty($uname)){
	 									$error['u'] = "Enter Admin Username";
	 								}else if(empty($pass)){
	 									$error['u'] = "Enter Admin Password";
	 								}else if(empty($image)){
	 									$error['u'] = "Add Profile Pic";

	 								}

	 								if(count($error) == 0){
	 									$q = "insert into admin(username, password, profile) values('$uname','$pass','$image')";

	 									$result = mysqli_query($connect, $q);

	 									if ($result) {
	 										move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
	 									}else{

	 									}

	 									

	 									

	 								}

	 							} 
	 							if (isset($error['u'])) {
	 										$er = $error['u'];
	 										$show = "<h5 class='text-center alert alert-danger'>$er</h5>";
	 									}else{
	 										$show = "";
	 									}

	 							?>

	 							<h5 class="text-center">Add Admin</h5>

	 							<form method="post" enctype="multipart/form-data">
	 								
	 									<?php echo $show; ?>
	 								
	 								<div class="form-group">
	 									<label>Username</label>
	 									<input type="text" name="uname" class="form-control" autocomplete="off">
	 								</div>

	 								<div class="form-group">
	 									<label>Password</label>
	 									<input type="password" name="pass" class="form-control">
	 								</div>
	 								<div class="form-group">
	 									<label>Add Admin Profile Pic</label>
	 									<input type="file" name="img" class="form-control">
	 								</div><br>
	 								<input type="submit" name="add" value="Add New Admin" class="btn btn-success">

	 								
	 							</form>


	 						</div>
	 					</div>
	 				</div>


	 				

	 			</div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>