<?php

//header("Content-Type:application/json");
$url = "https://api.chucknorris.io/jokes/random";

//set a variable curl handler to fetch the information from this url
$ch=curl_init($url);
//prevent automatic output to screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

//create a variable for storing result
$results = curl_exec($ch);
curl_close($ch);
$data=json_decode($results);
print_r($data); //print out of the object
$joke = $data->value;
$image=$data->icon_url;
print_r($joke);
print_r($image);

//get a category list
$urlcat = "https://api.chucknorris.io/jokes/categories";
//set a variable curl handler to fetch the information from this url
$chCat=curl_init($urlcat);
//prevent automatic output to screen
curl_setopt($chCat, CURLOPT_RETURNTRANSFER,1);

//create a variable for storing result
$resultsCat = curl_exec($chCat);
curl_close($chCat);
$dataCat=json_decode($resultsCat);
print_r($dataCat); //print out of the object

//get a joke from category list
$category = "science";
$urlcatjoke = "https://api.chucknorris.io/jokes/random?category="
  .$category;
//set a variable curl handler to fetch the information from this url
$chCatjoke=curl_init($urlcatjoke);
//prevent automatic output to screen
curl_setopt($chCatjoke, CURLOPT_RETURNTRANSFER,1);

//create a variable for storing result
$resultsCatjoke = curl_exec($chCatjoke);
curl_close($chCatjoke);
$dataCatjoke=json_decode($resultsCatjoke);
print_r($dataCatjoke); //print out of the object
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Hello Chuck Norris</title>
</head>
<body>
  <div>
    <h2>Chuck's Norris Random Joke</h2>
    <p><?= $joke ?></p>
    <img src="<?= $image ?>"</img>
    </div>
    <h3>Chuck's Norris Joke Categories</h3>
    
</div>
</body>
</html>
