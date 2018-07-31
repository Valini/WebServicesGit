<?php
//https://msdn.microsoft.com/en-us/library/hh441726.aspx

//header("Content-Type:application/json");
//setup variables for requests
$api_key="AjDvdPcUrSfJfrA73THbzgQimIgKmNp1u4Q1GAq1TQKcEEVsGU_zn0BaJllRMkhm";
$mapArea="-73.9722,45.4065,-73.536,45.5121";
$includeLocations="";
$severity="2,3,4";
$type="2,9";

$url_structured="http://dev.virtualearth.net/REST/v1/Traffic/Incidents/"
.$mapArea.'/'
.$includeLocations.'/'
.$severity.'/'
.$type."?"
."key=".$api_key;

$url_structured1="http://dev.virtualearth.net/REST/v1/Traffic/Incidents/"
.$mapArea.'?'
//.$includeLocations.'/'
//.$severity.'/'
//.$type."?"
."key=".$api_key;

/*http://dev.virtualearth.net/REST/v1/Traffic/Incidents/
37,-105,45,-94?
key=YourBingMapsKey*/

//set a variable curl handler to fetch the information from this url
$ch=curl_init($url_structured1);
//prevent automatic output to screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

//create a variable for storing result
$results = curl_exec($ch);
curl_close($ch);
$data=json_decode($results);
print_r($data); //print out of the object
$cp = $data->resourceSets[0]->resources[0]->point->coordinates;

print_r($cp);





 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Hello Traffic Incidents</title>
</head>
<body>
  <div>
    <iframe width="500" height="400" frameborder="0"
    src="https://www.bing.com/maps/embed?h=400&w=500&cp=<?= $cp[0]; ?>~<?= $cp[1]; ?>&lvl=15&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no">
    </iframe>
    </div>
</div>
</body>
</html>
