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
	if ($run==TRUE)
		
	?>

	

	<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<style>
input[type=text], select {
    width: 10%;
    
    
    
    border: 0px ;
    
    
}
body {font-family: Arial, Helvetica, sans-serif;



}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #000000;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}
.bannerimage {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}


/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #000000;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 400px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
	.bannerimage {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
}

}
</style>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        position: fixed;
    
    
    width: 315px;
    border: 5px solid #f20079;
        height: 88%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	  body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav a.active2 {
  background-color: #4CAF50;
  color: white;
}
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.container {
    padding: 16px;
}
.boundry {
border: 5px solid #5cb55c;
height: 100%;}

.tab {
    display: block;
    background-color:#5cb55c; ;
    
    padding: 22px 16px;
    width: 90%;

	 border: 1px solid #2017a5;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}
.tabdash {
    
  border: 1px solid Blue;
   
   width: 114%;
    margin-left: -20px;
    background-color: lightblue;
	
}


    </style>
		</head>
  <body bgcolor="black">
  <div class="topnav">
  <a  href="#home">Start</a>
  <a href="#news">Route</a>
  <a class="active" href="#contact">Bookings</a>
  <a href="logout.php">Logout</a>
</div>

<div class="boundry">

<?php
showdata ()

?>
<?php
	 function showdata ()
	 {
	 global $con;
	 	 global $Destination;
		  global $session;
	
	 
	 $query = "SELECT `id`, `username`, `phone`,  `vehicle`, `Destination`, `Startpoint` FROM `users` WHERE `Destination`='$Destination'  AND `Mode`='Passenger'  AND `Bookingno`='$session'"  ;
	
	 
	 $run = mysqli_query($con,$query);
	 
       if ($run==TRUE)
	 {
       while($data = mysqli_fetch_assoc($run))
	   { ?>
	   <div class="tab" >
	   
	     <tr>
			 <td> <B>  <font color=" RED">Customer:</font>  <?php echo $data['username']; ?> <font color="black"></B><font>&nbsp &nbsp</td><br> <font color=" RED">Ph No:</font> <td> <?php echo $data['phone']; ?> <br></td><font color=" RED"> Pickup point:  </font> <td> <?php echo $data['Startpoint']; ?> </td> <br></td><font color=" RED"> Drop Point:  </font> <td> <?php echo $data['Destination']; ?> </td>
		    <a href="locatepsngr.php?id=<?php echo $data['id']; ?>"><button type="submit" name="psg">Show on map</button></a>
		</tr>
		
		</div>
	    <?php
	   }
	
 	 }
		   
		   
		   

	 else
	 {echo "error";}

}

?>
 
 
</div>
  </body>
</html>

	