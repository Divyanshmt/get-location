<?php 
session_start();
 $latp = '25.56780281';
  $session=$_SESSION['uid'];
   $con = mysqli_connect("localhost","root","","userinvolved");
   $Bookingno;
    $phonedrv;
showdata ();
showdata1 ();

 
?>
 
<!DOCTYPE html>
<html>

<body>
<input type="text"  name="latitude" id="lat" value="12">
 <input type="text"  name="longitude" id="lon" value="">
<button onclick=" printonz()">Click me</button>
<p id="demo1"></p>
<div id="map" style="width:100%;height:500px"></div>


<p id="demo"></p>

//passngr location grabing  
<?php function showdata ()
	 {
	 global $con;
	  global $session;
	 	
	
	   
	   
	 $query = "SELECT  `longitude`, `latitude` FROM `users` WHERE `id`='$session' " ;
	
	 
	 $run = mysqli_query($con,$query);
	 
       if ($run==TRUE)
	 {
       while($data = mysqli_fetch_assoc($run))
	   { 
	?>
	   <script> var lat1 = <?php echo $data['latitude'];?> ;
                  var lon1 = <?php echo $data['longitude'];?> ;

	   </script>
	   <?php
	   }
	   }
	   } ?>
	   
		   
	// driver location grabbing
		   
<?php function showdata1 ()
	 {
	 global $con;
	  global $session;
	  global $Bookingno;
	  global $phonedrv;
	 	
	
	  
	    
	 $query = "SELECT `phone`,`longitude`, `latitude` FROM `users` WHERE `Bookingno`='$session' AND `Mode`='Passenger' " ;
	
	 
	 $run = mysqli_query($con,$query);
	 
       if ($run==TRUE)
	 {
       while($data = mysqli_fetch_assoc($run))
	   { 
		   $phonedrv =  $data['phone'];

	?>
	   <script> var latpsg = <?php echo $data['latitude'];?> ;
                  var lonpsg = <?php echo $data['longitude'];?> ;
				    

	   </script>
	   <?php
	   }
	 }
	   }
	 ?>
	   		   

		   
		   
	<script>	    
 

 var x = document.getElementById("lat").value;
var y = document.getElementById("lon");

getLocation();
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
  document.getElementById("lat").value =position.coords.latitude ;
    document.getElementById("lon").value =position.coords.longitude ;
    //x.innerHTML = position.coords.latitude ;
}
var myCenterdrvr = {lat:latpsg, lng: lonpsg};
function myMap() {

  var mapCanvas = document.getElementById("map");
  
  var myCenter = new google.maps.LatLng(lat1,lon1); 
  var mapOptions = {center: myCenter, zoom: 14};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
    animation: google.maps.Animation.BOUNCE
  });
  marker.setMap(map);
   var infowindow = new google.maps.InfoWindow({
    content: "Me"
  });
  infowindow.open(map,marker);
 var marker1= new google.maps.Marker({
    position:  myCenterdrvr,
    icon: "car.png"
  });
  marker1.setMap(map);
  var infowindow = new google.maps.InfoWindow({
    content: " Contact No:<?php echo $phonedrv;?>"
  });
  infowindow.open(map,marker1);
  
  
   
   
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7AGBtjOj9f4F7kFPP102Ps43dOp4yAB0&callback=myMap"></script>


</body>
</html>

