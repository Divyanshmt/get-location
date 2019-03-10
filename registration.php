<?php
echo "hello world .....";
$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];
     //connect to database
     $con = mysqli_connect("localhost","root","","userinvolved");
	 
	 if($con)
	 {echo "yes";
	 }
	 else
	 {echo "No";
	 }
	 
	 $query = "INSERT INTO `users`(`username`, `phone`, `password`) VALUES ('$username','$phone','$password')";
	 $run = mysqli_query($con,$query);
	 if ($run==TRUE){
	?>
<script>
alert('you are registered.press ok to continue');
window.open('loginform.html','_self');

	

</script>
	 <?php } 
	else {
	
	?>
		<script>
alert('Something went wrong .Try again');


	

</script> <?php } ?>
	
	
	