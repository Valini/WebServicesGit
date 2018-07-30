<?php
//creates the links required for restful
function create_links($arg=""){
if($arg!=""){
  $arg = "?".$arg;
$links = array("rel"=>"self",
  "href"=>"localhost:8080/api/web.php" .$arg);
  return $links;
}//END OF FUNCTION

//handles responses
function response($data, $status=200){
  //check if the get contains format and is set
  if(isset($_GET['format'])){
	if ($_GET['format'] == "xml")
      respond_as_xml($data, $status);

	elseif ($_GET['format'] == "json")
      respond_as_json($data, $status);

  else{
    $links = isset($data["Links"])? $data['Links']:array();
    respond_as_json(array("Error"=>"Unknown Format", "Links"=>$links),400);
  }
  }else{
	 respond_as_json($data, $status);
  } 
  }


//handles responses as json
function respond_as_json($data, $status){
  //json format
  header("Content-Type:application/json");
  header("HTTP/1.1 ". $status);
  echo json_encode($data);
	die();
}//end of respnse json

//handles response as xml
function respond_as_xml($data, $status){
  header("Content-Type:text/xml");
  header("HTTP/1.1 ". $status);
  //function call to convert array to xml
  $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
  array_to_xml($data, $xml_data);
  print $xml_data->asXML();

}//end of xml response

//converts ARRAY TO xml
function array_to_xml($data, &$xml_data){
  //https://stackoverflow.com/a/59659940
foreach($data as $key => $value){
  if(is_numeric($key)){
  $key = 'item';//.$key
  }
  if(is_array($value)){
  $subnode = $xml_data->addChild($key);
    array_to_xml($value, $subnode);
  }else{
    $xml_data->addChild("key", htmlspecialchars("$value"));
  }
}

}


 ?>
