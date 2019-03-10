<?php

$con = mysqli_connect("localhost","root","","userinvolved");
	 
	 if($con)
	 {echo "yes";
	 }
	 else
	 {echo "No";
	 }
	 session_start();
	   echo $_SESSION['uid'];
$session=$_SESSION['uid'];
$latitude = $_POST['latitude'] ;

$longitude = $_POST['longitude'] ;
//chek
 echo $_SESSION['uid'];
  
 $query1 = "UPDATE `users` SET `longitude`='$longitude' WHERE `id`='$session' ";
  $query = "UPDATE `users` SET `latitude`='$latitude' WHERE `id`='$session' ";
	 $run = mysqli_query($con,$query);
	 	 $run1 = mysqli_query($con,$query1);

if(isset($_POST['drv']))
{

 $query = "UPDATE `users` SET `mode`='Driver' WHERE `id`='$session' ";
	 $run = mysqli_query($con,$query);
     header("location: vehicle.html");
}
if(isset($_POST['psg']))
{

 $query = "UPDATE `users` SET `mode`='Passenger' WHERE `id`='$session' ";
	 $run = mysqli_query($con,$query);
 header("location: dashboardpsngr.html");
}



?>