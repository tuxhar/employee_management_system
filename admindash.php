<html>
  <head>
     <title>Admindash</title>
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
  <div class="container">
  <a href="addemp.php" class="btn btn-warning">
    Add
  </a>
  <br><br>
  <table class="table table-sm table-dark table-hover">
  <tr>
      <th>Sr No</th>
	  <th>First Name</th>
	  <th>Last Name</th>
	  <th>Email</th>
	  <th>Password</th>
	  <th>Mobile No</th>
	  <th>Action</th>
	  <th>Status</th>
	  <?php
	  include('dbcon.php');
	  $sql="select * FROM employee";
	  $run=mysqli_query($con,$sql);
	  $count=mysqli_num_rows($run);
	  $sr=0;
	  if($count>0){
		  while($data=mysqli_fetch_assoc($run)){
			  $sr++;
		  echo "<tr><td>".$sr."</td>";
		  echo "<td>".$data['employee_fname']."</td>";
		  echo "<td>".$data['employee_lname']."</td>";
		  echo "<td>".$data['employee_email']."</td>";
		  echo "<td>".$data['employee_password']."</td>";
		  echo "<td>".$data['employee_mobile']."</td>";
		  echo "<td><a href='edit.php?id=".$data['employee_id']."' class='badge badge-info btn-sm'>edit</a>&nbsp";
	      echo "<a href='delete.php?id=".$data['employee_id']."' class='badge badge-danger btn-sm'>delete</a></td>";
		  echo "<td><span class='badge badge-pill badge-primary'>".$data['employee_status']."</span></td></tr>";
		  }
	  }
	  
	  ?>
  </tr>
  
  </table>
  </div>
  
  </body>
  </html>