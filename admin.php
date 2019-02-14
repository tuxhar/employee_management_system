 <?php 
  session_start();
  if(isset($_SESSION['uadmin_id'])){
	 header('Location:admindash.php'); 
	  
  }
  ?>
  <?php
include('dbcon.php');
if(isset($_POST['admin_submit'])){
$username=$_POST['admin_username'];
$password=$_POST['admin_password'];
   $sql="SELECT * FROM `admin` WHERE `admin_username`='$username' AND `admin_password`='$password'";
   $run=mysqli_query($con,$sql);
   
   $count=mysqli_num_rows($run);
   if($count>0){
	   while($data=mysqli_fetch_assoc($run)){
		   $_SESSION['uadmin_id']=$data['admin_id'];
		   header('Location:admindash.php');
	   
	   }
   }else{
	    ?>
		<script>alert("please enter correct username and password");
		window.location.href = "index.php";
		</script>
		<?php
	   
   }
}
?>