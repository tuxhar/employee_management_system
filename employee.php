<?php
include('dbcon.php');
session_start();
$id=$_SESSION['uemployee_id'];

$sql="SELECT * FROM `employee` WHERE `employee_id`='$id'";
$run=mysqli_query($con,$sql);
$count=mysqli_num_rows($run);
$data=mysqli_fetch_assoc($run);



?>

		<html>
  <head>
     <title>Employee dashboard</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <a class="navbar-brand" href="#">Employee Management System</a>
	 <div style="width: 100%;"><a href="logout.php" style="float: right;" class="btn btn-danger">Logout</a></div>
  </nav>
  <br><br><br>
  <?php
include('dbcon.php');
if(isset($_POST['submit'])){
  $fname=$_POST['employee_fname'];
  $lname=$_POST['employee_lname'];
  $email=$_POST['employee_email'];
  $password=$_POST['employee_password'];
  $mobile=$_POST['employee_mobile'];
  $id=$_POST['sid'];
  
  $sql="UPDATE `employee` SET `employee_fname` = '$fname', `employee_lname` = '$lname', `employee_email` = '$email', `employee_password` = '$password', `employee_mobile` = '$mobile' WHERE `employee`.`employee_id` = $id";
   if($run=mysqli_query($con,$sql)){
   ?>
		<script>alert("updated successfully");
		
		</script>
		<?php
   }
  }
?>
 
  
  <div class="container bg-dark"><br>
  
  <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <form action="employee.php" method="post" class="text-white">
	  <div class="form-group">
    <label for="fname">First name:</label>
    <input type="text" class="form-control" id="fname" name="employee_fname" value="<?php echo $data['employee_fname']; ?>">
  </div>
  <div class="form-group">
    <label for="lname">Last name:</label>
    <input type="text" class="form-control" id="lname" name="employee_lname" value="<?php echo $data['employee_lname'];?>">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="employee_email" value="<?php echo $data['employee_email']?>">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="employee_password" value="<?php echo $data['employee_password'];?>">
  </div>
  <div class="form-group">
    <label for="mobile">Mobile:</label>
    <input type="text" class="form-control" id="mobile" name="employee_mobile" value="<?php echo $data['employee_mobile']; ?>">
  </div>
  <td><input type="hidden" name="sid" value="<?php echo $data['employee_id']; ?>"></td>
  <button type="submit" name="submit" class="btn btn-primary mx-auto d-block">Submit</button>
</form>
<div class="col-md-4"></div>
</div>
  </div>
  </div>
  </body>
  </html>
		
		
		
		
		
		