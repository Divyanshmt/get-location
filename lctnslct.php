<?php>

session_start();
   if ($_SESSION['uid'])
   {

   }
   else
   {
   echo "Session Expired , Login Again";
   header('location:loginform.html');
   }

    $con = mysqli_connect("localhost","root","","userinvolved");
	 
	 if($con)
	 {echo "yes";
	 }
	 else
	 {echo "No";
	 }
  $Destination = $_POST['Destination'] ;
$Startpoint = $_POST['Startpoint'] ; 
   if(isset($_POST['submit']))
{


 $query = "INSERT INTO `users`(`Destination`, `Startpoint`) VALUES ('$Destination','$Startpoint')";
	 $run = mysqli_query($con,$query);

?>

