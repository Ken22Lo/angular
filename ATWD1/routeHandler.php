<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST, GET,PUT,DELETE");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

require_once 'RESTfulInterface.php';

class routeHandler implements RESTfulInterface {
    
	public function restGet($params){
		$type = array_shift($params);
		$keyword = array_shift($params);
	
    if($keyword==""){
	$error = (object) array();
	$error->ERROR='please input the field';
	echo json_encode($error);		
}
else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
                 
$sql = "SELECT * From route Where $type = '$keyword'";

$result = $conn->query($sql) or die($conn->error);

$dbdata = array();

  while ( $row = $result->fetch_assoc())  {
	
	$dbdata[] = ["ROUTE_ID" => $row['ROUTE_ID'], 
                 "COMPANY_CODE" => $row['COMPANY_CODE'],
				 "ROUTE_NAMEC"=>$row['ROUTE_NAMEC'],
                 "ROUTE_NAMES"=>$row['ROUTE_NAMES'],
                 "ROUTE_NAMEE"=>$row['ROUTE_NAMEE'],
				 "SERVICE_MODE" => $row['SERVICE_MODE'], 
                 "SPECIAL_TYPE"=>$row['SPECIAL_TYPE'],
				 "JOURNEY_TIME"=>$row['JOURNEY_TIME'],
                 "LOC_START_NAMEC"=>$row['LOC_START_NAMEC'],
                 "LOC_START_NAMES"=>$row['LOC_START_NAMES'],
                 "LOC_START_NAMEE"=>$row['LOC_START_NAMEE'],
                 "LOC_END_NAMEC"=>$row['LOC_END_NAMEC'],
                 "LOC_END_NAMES"=>$row['LOC_END_NAMES'],
                 "LOC_END_NAMEE"=>$row['LOC_END_NAMEE'],
                 "HYPERLINK_C"=>$row['HYPERLINK_C'],
                 "HYPERLINK_S"=>$row['HYPERLINK_S'],
                 "HYPERLINK_E"=>$row['HYPERLINK_E'],
                 "FULL_FARE"=>$row['FULL_FARE'],
                 "LAST_UPDATE_DATE"=>$row['LAST_UPDATE_DATE'],

				 ];
      
    
      
	  }
echo json_encode($dbdata);

 
$conn->close();

}
	}
	
	  public function restPut($params) {
          $ROUTE_ID = array_shift($params);
          $COMPANY_CODE = array_shift($params);
          $ROUTE_NAMEC = array_shift($params);
          $ROUTE_NAMES = array_shift($params);
          $ROUTE_NAMEE = array_shift($params);
          $ROUTE_TYPE = array_shift($params);
          $SERVICE_MODE = array_shift($params);
          $SPECIAL_TYPE = array_shift($params);
          $JOURNEY_TIME = array_shift($params);
          $LOC_START_NAMEC = array_shift($params);
          $LOC_START_NAMES = array_shift($params);
          $LOC_START_NAMEE = array_shift($params);
          $LOC_END_NAMEC = array_shift($params);
          $LOC_END_NAMES = array_shift($params);   
          $LOC_END_NAMEE = array_shift($params);   
          $HYPERLINK_C = array_shift($params);   
          $HYPERLINK_S = array_shift($params);   
          $HYPERLINK_E = array_shift($params);
          $FULL_FARE = array_shift($params); 
          $LAST_UPDATE_DATE = array_shift($params);
              
              
          if($ROUTE_ID==""||$COMPANY_CODE==""||$ROUTE_NAMEC==""|| $ROUTE_NAMES==""||$ROUTE_NAMEE==""||$ROUTE_TYPE==""||$SERVICE_MODE==""|| $SPECIAL_TYPE==""||$JOURNEY_TIME==""||$LOC_START_NAMEC==""|| $LOC_START_NAMES==""||$LOC_START_NAMEE==""||$LOC_END_NAMEC==""||$LOC_END_NAMES==""||$LOC_END_NAMEE==""||$HYPERLINK_C==""||$HYPERLINK_S==""||$HYPERLINK_E==""||$FULL_FARE==""||$LAST_UPDATE_DATE=="") {
          $error = (object) array();
          $error->ERROR='please input the field';
	      echo json_encode($error);	
    
}else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
                
$sql = "UPDATE route 
SET COMPANY_CODE='$COMPANY_CODE', ROUTE_NAMEC='$ROUTE_NAMEC', ROUTE_NAMES='$ROUTE_NAMES', ROUTE_NAMEE='$ROUTE_NAMEE', ROUTE_TYPE='$ROUTE_TYPE',SERVICE_MODE='$SERVICE_MODE',SPECIAL_TYPE='$SPECIAL_TYPE' ,JOURNEY_TIME='$JOURNEY_TIME',LOC_START_NAMEC='$LOC_START_NAMEC',LOC_START_NAMES='$LOC_START_NAMES',LOC_START_NAMEE='$LOC_START_NAMEE',LOC_END_NAMEC='$LOC_END_NAMEC',LOC_END_NAMES='$LOC_END_NAMES',LOC_END_NAMEE='$LOC_END_NAMEE',HYPERLINK_C='$HYPERLINK_C',HYPERLINK_S='$HYPERLINK_S',HYPERLINK_E='$HYPERLINK_E',FULL_FARE='$FULL_FARE',LAST_UPDATE_DATE ='$LAST_UPDATE_DATE' WHERE ROUTE_ID =$ROUTE_ID";

if ($conn->query($sql) === TRUE) {
   echo " updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	}
}
	
	  public function restPost($params) {
          $ROUTE_ID = array_shift($params);
          $COMPANY_CODE = array_shift($params);
          $ROUTE_NAMEC = array_shift($params);
          $ROUTE_NAMES = array_shift($params);
          $ROUTE_NAMEE = array_shift($params);
          $ROUTE_TYPE = array_shift($params);
          $SERVICE_MODE = array_shift($params);
          $SPECIAL_TYPE = array_shift($params);
          $JOURNEY_TIME = array_shift($params);
          $LOC_START_NAMEC = array_shift($params);
          $LOC_START_NAMES = array_shift($params);
          $LOC_START_NAMEE = array_shift($params);
          $LOC_END_NAMEC = array_shift($params);
          $LOC_END_NAMES = array_shift($params);   
          $LOC_END_NAMEE = array_shift($params);   
          $HYPERLINK_C = array_shift($params);   
          $HYPERLINK_S = array_shift($params);   
          $HYPERLINK_E = array_shift($params);
          $FULL_FARE = array_shift($params); 
          $LAST_UPDATE_DATE = array_shift($params);
          

if($ROUTE_ID==""||$COMPANY_CODE==""||$ROUTE_NAMEC==""|| $ROUTE_NAMES==""||$ROUTE_NAMEE==""||$ROUTE_TYPE==""||$SERVICE_MODE==""|| $SPECIAL_TYPE==""||$JOURNEY_TIME==""||$LOC_START_NAMEC==""|| $LOC_START_NAMES==""||$LOC_START_NAMEE==""||$LOC_END_NAMEC==""||$LOC_END_NAMES==""||$LOC_END_NAMEE==""||$HYPERLINK_C==""||$HYPERLINK_S==""||$HYPERLINK_E==""||$FULL_FARE==""||$LAST_UPDATE_DATE=="") {
	$error = (object) array();
	$error->ERROR='please input the field';
	echo json_encode($error);	
    
}else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
  
$sql = "INSERT INTO route (ROUTE_ID,COMPANY_CODE,ROUTE_NAMEC,ROUTE_NAMES,ROUTE_NAMEE,ROUTE_TYPE,SERVICE_MODE,SPECIAL_TYPE,JOURNEY_TIME,LOC_START_NAMEC,LOC_START_NAMES,LOC_START_NAMEE,LOC_END_NAMEC,LOC_END_NAMES,LOC_END_NAMEE,HYPERLINK_C,HYPERLINK_S,HYPERLINK_E,FULL_FARE,LAST_UPDATE_DATE)
VALUES ('" . $ROUTE_ID . "','" . $COMPANY_CODE . "','" . $ROUTE_NAMEC . "','" . $ROUTE_NAMES . "','" . $ROUTE_NAMEE . "','" . $ROUTE_TYPE . "','" . $SERVICE_MODE . "','" . $SPECIAL_TYPE . "','" . $JOURNEY_TIME . "','" . $LOC_START_NAMEC . "','" .  $LOC_START_NAMES . "','" .  $LOC_START_NAMEE . "','" .  $LOC_END_NAMEC . "','" .  $LOC_END_NAMES . "','" .  $LOC_END_NAMEE . "','" .  $HYPERLINK_C . "','" .  $HYPERLINK_S . "','" .  $HYPERLINK_E . "','" .  $FULL_FARE . "','" .  $LAST_UPDATE_DATE . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	}
}
	
	public function restDelete($params){
		$keyword = array_shift($params);
	
    if($keyword==""){
	$error = (object) array();
	$error->ERROR='please input the field';
	echo json_encode($error);		
}
else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
    
$sql = "DELETE FROM route WHERE ROUTE_ID = $keyword";


if ($conn->query($sql) === TRUE) {
    echo " delete successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	   }
        
    }
          
}