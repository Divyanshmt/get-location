
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>


       <p id="demo"></p>
        




<script>
getLocation();

<?php

$test=' <script>
        var x = document.getElementById("demo");
	   document.writeln(x);
         </script>';
echo $test;


?>



var x1 = document.getElementById("demo1");


 

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML =position.coords.latitude ;
}
 x1.innerHTML =x;
</script>

</body>
</html>


<?php

$test=' <script>
        var ab = "hi";
	   document.writeln(ab);
         </script>';
echo $test;


?>