<?php

$con = mysqli_connect("localhost","root","","userinvolved");
	 
	 if($con)
	 {echo "yes";
	 }
	 else
	 {echo "No";
	 }

	 

if(isset($_POST['login']))
{
$username = $_POST['username'] ;
$password = $_POST['password'] ;

$qry="SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
$run=mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
if($row <1)
{
	
?>
<script>
alert('username or password not matched !!');
window.open('loginform.html','_self');

</script>
	<?php
}
else
{
$data=mysqli_fetch_assoc($run);
$id=$data['id'];
session_start();
$_SESSION['uid']=$id;
header('location:mode.html');
}

	
}


?>