<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


input[type=text], select {
    width: 100%;
    
   
    
    
    
    
}
</style>
</head>
<body bgcolor="#000000">


 <form  method="post" action="chk1.php">
 lat:<input type="text"  name="latitude" id="lat" value="latitude">
 lon:<input type="text"  name="longitude" id="lon" value="longitude">
 <button type="submit" name="submit">Driver</button>
</form>

 



<script>
var x = document.getElementById("lat");
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
</script>



</body>
</html>
