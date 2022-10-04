<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST, GET,PUT,DELETE");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

require_once 'RESTfulInterface.php';

class rstopHandler implements RESTfulInterface {
    
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
                 
$sql = "SELECT * From rstop Where $type = '$keyword'";

$result = $conn->query($sql) or die($conn->error);

$dbdata = array();

  while ( $row = $result->fetch_assoc())  {
	
	$dbdata[] = ["ROUTE_ID" => $row['ROUTE_ID'], 
                 "ROUTE_SEQ" => $row['ROUTE_SEQ'],
				 "STOP_SEQ"=>$row['STOP_SEQ'],
				 "STOP_ID" => $row['STOP_ID'], 
                 "STOP_PICK_DROP"=>$row['STOP_PICK_DROP'],
                 "STOP_NAMEC"=>$row['STOP_NAMEC'],
                 "STOP_NAMES"=>$row['STOP_NAMES'],
                 "STOP_NAMEE" => $row['STOP_NAMEE'],
                 "LAST_UPDATE_DATE"=>$row['LAST_UPDATE_DATE'],
                 
				 ];
      
	  }
echo json_encode($dbdata);

 
$conn->close();

}
	}
	
	  public function restPut($params) {
          $ROUTE_ID = array_shift($params);
          $ROUTE_SEQ = array_shift($params);
          $STOP_SEQ = array_shift($params);
          $STOP_ID = array_shift($params);
          $LAST_UPDATE_DATE = array_shift($params);

if($ROUTE_ID==""||$ROUTE_SEQ==""||$STOP_SEQ==""||$STOP_ID==""||$LAST_UPDATE_DATE=="") {
	$error = (object) array();
	$error->ERROR='please input the field';
	echo json_encode($error);	
    
}else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
                
$sql = "UPDATE rstop
SET ROUTE_SEQ='$ROUTE_SEQ', STOP_SEQ='$STOP_SEQ',STOP_ID='$STOP_ID',LAST_UPDATE_DATE='$LAST_UPDATE_DATE' WHERE ROUTE_ID =$ROUTE_ID";

if ($conn->query($sql) === TRUE) {
   echo " updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	}
}
	
	  public function restPost($params) {
          $ROUTE_ID = array_shift($params);
          $ROUTE_SEQ = array_shift($params);
          $STOP_SEQ = array_shift($params);
          $STOP_ID = array_shift($params);
          $LAST_UPDATE_DATE = array_shift($params);

if($ROUTE_ID==""||$ROUTE_SEQ==""||$STOP_SEQ==""||$STOP_ID==""||$LAST_UPDATE_DATE=="") {
	$error = (object) array();
	$error->ERROR='please input the field';
	echo json_encode($error);	
    
}else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
  
$sql = "INSERT INTO rstop (ROUTE_ID,ROUTE_SEQ,STOP_SEQ,STOP_ID,LAST_UPDATE_DATE)
VALUES ('" . $ROUTE_ID . "','" . $ROUTE_SEQ . "','" . $STOP_SEQ . "','" . $STOP_ID . "','" . $LAST_UPDATE_DATE . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
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
    
$sql = "DELETE FROM rstop WHERE ROUTE_ID = $keyword";


if ($conn->query($sql) === TRUE) {
    echo " delete successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	   }
        
    }
          
}