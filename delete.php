<?php
include('dbcon.php');
$id=$_GET['id'];
$sql="delete  from employee where employee_id='$id'";
if($run=mysqli_query($con,$sql)){
?>	
<script>
 alert("Deleated successfully");
window.location.href="admindash.php";
</script>
<?php
}
?>