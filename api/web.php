<h1>Welcome to RestFul<h1>
  <?php
  require_once("functions.php");
//check for get method
if($_SERVER['REQUEST_METHOD']=="GET"){
//build array of people
//$people =["John", "Peter", "Jane", "Joe"];
  //send json responses
  //build an array of an array
$people =array(
array("id"=>2, "name"=>"John", "city"=>"Montreal"),
array("id"=>3, "name"=>"Peter", "city"=>"Ottawa"),
array("id"=>4, "name"=>"Jane", "city"=>"Vancouver")
);
//check to see if a user REQUEST_METHOD isset is used in case user does not exist
if(isset($_GET['id'])){
  $user_found=false;
//return information about user to look for this //
foreach($people as $item){
  //if our get id is same at the id in the array
if($_GET['id']==$item['id']){
$user_found=true;
  //$json_people= json_encode(array(
  //  "Person"=>$item,
  //  "Links"=>create_links('id='.$_GET['id'])), 200
//  );

response(array("Person"=>$item, "Links"=>create_links('id='.$_GET['id']))
          );
}
}//end of for each

if(!$user_found){
//if user if not found, send an error
////$json_people=json_encode(
//array("Error"=>"User was not found",
    //  "Links"=>create_links('id='.$_GET['id'])),400
  //  );
  response(
          array("Error"=>"User was not found",
                "Links"=>create_links('id='.$_GET['id']) )
          ,400
        );
}
}else{
//return list of all users
//build an array of arrays
//$links = array("ref"=>"self", "href"=>"localhost:8080/api/web.php");

//$json_people= json_encode(array(
//  "people"=>$people,
//  "Links"=>create_links()
response(
      array("People"=>$people, "Links"=>create_links())
    );


}//endif get user id




//$json_people=json_encode($people);

//change the format of the document we are sending to JSON type
//header("Content-Type:application/json");
//echo $json_people;

}else{

//not GET, return error
echo " error";


}

  ?>
