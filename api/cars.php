<?php
function fetch_curl($url){
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
  return $data;
}
$base_url = "https://swapi.co/api/";
/*
//only good if you know he number of pages
for($i; $i<=4; $i++){
$url = $base_url."vehicles/?page=".$i;
 $data =fetch_curl($url);
 foreach($data->results as $item){
 echo $item->name.'<br/>';
 }
}*/
//better option
$i=1;
do{
$url = $base_url."vehicles/?page=".$i;
$data =fetch_curl($url);
foreach($data->results as $item){
  
echo $item->name.'<br/>';
}
$i++;
}
while($data->next !=NULL);


 ?>
