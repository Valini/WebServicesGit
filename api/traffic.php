<?php
header("Content-Type:application/json");
//setting up variables
$api_key="AjDvdPcUrSfJfrA73THbzgQimIgKmNp1u4Q1GAq1TQKcEEVsGU_zn0BaJllRMkhm";
$mapArea="37";
$includeLocations="-105";
$severity="45";
$type="-94";

$url_structured="http://dev.virtualearth.net/REST/v1/Traffic/Incidents/"
.$mapArea.','
.$includeLocations.','
.$severity.','
.$type.'?'
."key=".$api_key


//set a variable curl handler to fetch the information from this url
$ch=curl_init($url_structured);
//prevent automatic output to screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

//create a variable for storing result
$results = curl_exec($ch);
curl_close($ch);
$data=json_decode($results);
$cp=$data->resources[0]->resources[0]->point->resources;





 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Hello Traffic Incidents</title>
</head>
<body>
  <div>
     <iframe width="500" height="400" frameborder="0" src="https://www.bing.com/maps/embed?h=400&w=500&cp=45.40827556878788~-73.9424036717517&lvl=14&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no">
     </iframe>
     <div style="white-space: nowrap; text-align: center; width: 500px; padding: 6px 0;">
        <a id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=45.40827556878788~-73.9424036717517&amp;sty=r&amp;lvl=14&amp;FORM=MBEDLD">View Larger Map</a> &nbsp; | &nbsp;
        <a id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=45.40827556878788~-73.9424036717517&amp;sty=r&amp;lvl=14&amp;rtp=~pos.45.40827556878788_-73.9424036717517____&amp;FORM=MBEDLD">Get Directions</a>
    </div>
</div>
</body>
</html>
