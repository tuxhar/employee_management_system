<?php
session_start();
if(isset($_SESSION['uemployee_id'])){
header('Location:employee.php');
}
?>
<?php
include('dbcon.php');
if(isset($_POST['employee_submit'])){
	
$email=$_POST['employee_email'];
$password=$_POST['employee_password'];
$status="approved";
$sql="SELECT * FROM `employee` WHERE `employee_email`='$email' AND `employee_password`='$password' AND `employee_status`='$status'";
$run=mysqli_query($con,$sql);
$count=mysqli_num_rows($run);
if($count>0){
	while($data=mysqli_fetch_assoc($run)){
		$_SESSION['uemployee_id']=$data['employee_id'];
		header('Location:employee.php');
		
	}
	
}else{
	?>
<script>
alert("You are in pending state please contact to admin");
window.location.href="index.php";
</script>	
	
	
	<?php
	
}
}
?>


<html>
  <head>
     <title>Home</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <a class="navbar-brand" href="#">Employee Management System</a>
  </nav>
  <br><br><br>
  <div class="container">
  <a href="#admin" data-toggle="modal" style="text-decoration:none;">
  <div class="card border-primary mb-3 bg-dark" style="max-width: 20rem;">
  
  <div class="card-body">
    <h4 class="card-title text-warning">Admin Login</h4>
  </div>
  </div></a>
  <a href="#employee" data-toggle="modal" style="text-decoration:none;">
  <div class="card border-primary mb-3 bg-dark" style="max-width: 20rem;">
  <div class="card-body">
    <h4 class="card-title text-warning">Employee Login</h4>
    </div>
  </div></a>
</div>
<div class="modal fade show" id="admin">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADMIN LOGIN</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="admin.php" method="post">
		    <div class="form-group">
			   <label for="admin_username">Username:</label>
			   <input type="text" name="admin_username" id="admin_username" value="" class="form-control" placeholder="Enter Admin Username">
			</div>
			<div class="form-group">
			   <label for="admin_username">Password:</label>
			   <input type="password" name="admin_password" id="admin_password" value="" class="form-control" placeholder="Enter Admin Password">
			</div>
			<input type="submit" value="LOGIN" name="admin_submit" class="form-control btn btn-success">
		  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
  
  <div class="modal fade show" id="employee">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EMPLOYEE LOGIN</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post">
		    <div class="form-group">
			   <label for="employee_email">Email:</label>
			   <input type="email" name="employee_email" id="employee_email" value="" class="form-control" placeholder="Enter Employee Email">
			</div>
			<div class="form-group">
			   <label for="employee_username">Password:</label>
			   <input type="password" name="employee_password" id="employee_password" value="" class="form-control" placeholder="Enter Employee Password">
			</div>
			<input type="submit" value="LOGIN" name="employee_submit" class="form-control btn btn-success">
		  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  </body>
  </html>
 