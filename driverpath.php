<?php
 session_start();

  
 $Destination = $_POST['Destination'];
$Startpoint = $_POST['Startpoint'];
$session= $_SESSION['uid'];
     //connect to database
     $con = mysqli_connect("localhost","root","","userinvolved");
	 
	 if($con)
	 {echo "yes";
	 }
	 else
	 {echo "No";
	 }
	 
	 $query1 = "UPDATE `users` SET `Destination`='$Destination' WHERE `id`='$session' ";
  $query = "UPDATE `users` SET `Startpoint`='$Startpoint' WHERE `id`='$session' ";
	 $run = mysqli_query($con,$query);
	 $run1 = mysqli_query($con,$query1);
	if ($run==TRUE) ?>
			 <script>
window.open('dashboarddrvr.html','_self');

</script>
	

