<html>
<head>
    <link rel="stylesheet" type="text/css" href="analysis_style.css" media="screen"/>

	<title> MY Portal - APAS GT </title>
	
</head>
<body>
    <?php 
    
    include("connection.php");
    include("nav_bar.php");
   
    ?>


<div class="vertical-menu" style="float: left">
  <a href="home.php">Dashboard</a>
  <a href="logger.php">Data</a>
  <a href="analysis.php" class="active">Analysis</a>
  <a href="#">Overview</a>
  <a href="#">
  <form method="post" action="export.php" align="center" onsubmit="return confirm('Export data?');">  
  <input type="submit" name="export" value="Export" class="btn_bar" />
  </form></a>
  <form action="delete.php" id="my-form" method="post" onsubmit="return confirm('All data records will be deleted. Please confirm.');"> 
  <input hidden type="checkbox" name="check_list[]" checked="checked">
  <a href="#"><button type="submit" name="delete" form="my-form" class="btn_bar">Clean</button></a>
</div>


<div id="map"></div>

                <script>

                var map;
                var marker;
                var LatLng;

                  function initMap() {

                    LatLng = {lat: 0,lng: 0};
                    
                    map = new google.maps.Map(document.getElementById("map"), {
                      zoom: 0,
                      center: LatLng,
                      mapTypeId: 'roadmap'
                    });
          
                  }
      
  
                  function addMarker(){

                    var Lat = 22.338655124839782; //parseFloat(document.getElementById('Field_103').value);
                    var Lng = 114.17567092941614; //parseFloat(document.getElementById('Field_104').value);

                    LatLng  = {lat: Lat, lng: Lng};

                    marker = new google.maps.Marker({
                        position: LatLng,
                        map: map,
                      });
    
                      map.setZoom(16);

                      map.setCenter({
                      lat: Lat,
                      lng: Lng
                    });
           
                    }

                  window.initMap = initMap;

                  setInterval(addMarker, 1000);


                </script>
              
                
                <script
                
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaarysJwQ5J-nRUsa9DikUMGwcT0OThxI&callback=initMap&v=weekly"
                defer>
                
                </script>


    

</body>
</html>
