<?php 
session_start();
 $latp = '25.56780281';
  $session=$_SESSION['uid'];
   $con = mysqli_connect("localhost","root","","userinvolved");
showdata ();
 
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
	<script>	    
 
  var z = document.getElementById("demo");
 var x = document.getElementById("lat").value;
var y = document.getElementById("lon");
function printonz() {
 z.innerHTML = <?php echo '25.5678028'?>;
}
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
function myMap() {

  var mapCanvas = document.getElementById("map");
  var myCenter = new google.maps.LatLng(lat1,lon1); 
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
    animation: google.maps.Animation.BOUNCE
  });
  marker.setMap(map);
  
   var marker = new google.maps.Marker({
    position: myCenter,
		
    icon: "car.png"
  });
  marker.setMap(map);
  
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7AGBtjOj9f4F7kFPP102Ps43dOp4yAB0&callback=myMap"></script>


</body>
</html>

