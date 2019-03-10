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

//chek
 echo $_SESSION['uid'];

	 
if(isset($_POST['jip']))
{

 $query = "UPDATE `users` SET `vehicle`='JIP' WHERE `id`='$session' ";
	 $run = mysqli_query($con,$query);
     header("location: bookdrvr.php");
}
if(isset($_POST['taxi']))
{

 $query = "UPDATE `users` SET `vehicle`='TAXI' WHERE `id`='$session' ";
	 $run = mysqli_query($con,$query);
     header("location: bookdrvr.php");
}

if(isset($_POST['bus']))
{

 $query = "UPDATE `users` SET `vehicle`='BUS' WHERE `id`='$session' ";
	 $run = mysqli_query($con,$query);
     header("location: bookdrvr.php");
}
if(isset($_POST['auto']))
{

 $query = "UPDATE `users` SET `vehicle`='AUTO' WHERE `id`='$session' ";
	 $run = mysqli_query($con,$query);
     header("location: bookdrvr.php");
}
?>