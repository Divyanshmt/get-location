<?php

$m=$_GET['id'];
session_start();

  

$session= $_SESSION['uid'];
     //connect to database
     $con = mysqli_connect("localhost","root","","userinvolved");
	  
 $query = "UPDATE `users` SET `Bookingno`='$m' WHERE `id`='$session' ";
 
	 $run = mysqli_query($con,$query);

if ($run==TRUE)
	?>
<script>
alert('you havd booked.Now Trace your vehicle');
window.open('chking all grabings.php','_self');

</script>

