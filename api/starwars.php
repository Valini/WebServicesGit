<?php
//header("Content-Type:application/json");
//create a variable for base url
$base_url = "https://swapi.co/api/";
$url = $base_url."vehicles/?page=4";
//set a variable curl handler to fetch the information from this url
$ch=curl_init($url);

//prevent automatic output to screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

//create a variable for storing result
$results = curl_exec($ch);
curl_close($ch);

//print the results
//print_r($results);

//parse to get the number of vehicles
$data=json_decode($results);
//print_r($data->count).'<br/><br/>';

echo "Number of vehicles :".$data->count.'<br/><br/>';
foreach($data->results as $item){
echo $item->name.'<br/>';

}
 ?>
