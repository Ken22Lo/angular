<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST, GET,PUT,DELETE");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

require_once 'RESTfulInterface.php';

class stopHandler implements RESTfulInterface {
    
	public function restGet($params){
		$type = array_shift($params);
		$keyword = array_shift($params);
	
    if($keyword==""){
	$error = (object) array();
	$error->ERROR='please input keyword and type';
	echo json_encode($error);		
}
else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
                 
$sql = "SELECT * From stopbus Where $type = '$keyword'";

$result = $conn->query($sql) or die($conn->error);

$dbdata = array();

  while ( $row = $result->fetch_assoc())  {
	
	$dbdata[] = ["STOP_ID" => $row['STOP_ID'], 
                 "STOP_TYPE" => $row['STOP_TYPE'],
				 "X"=>$row['X'],
				 "Y" => $row['Y'], 
				 "LAST_UPDATE_DATE"=>$row['LAST_UPDATE_DATE'],

				 ];
      
	  }
echo json_encode($dbdata);

 
$conn->close();

}
	}
	
	  public function restPut($params) {
          $STOP_ID = array_shift($params);
          $STOP_TYPE = array_shift($params);
          $X = array_shift($params);
          $Y = array_shift($params);
          $LAST_UPDATE_DATE = array_shift($params);

          if($STOP_ID==""||$STOP_TYPE==""||$X==""||$Y==""||$LAST_UPDATE_DATE=="") {
          $error = (object) array();
          $error->ERROR='please input the field';
	      echo json_encode($error);	
    
}else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
                
$sql = "UPDATE stopbus 
SET STOP_TYPE='$STOP_TYPE', X='$X',Y='$Y',LAST_UPDATE_DATE='$LAST_UPDATE_DATE' WHERE STOP_ID =$STOP_ID";

if ($conn->query($sql) === TRUE) {
   echo " updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	}
}
	
	  public function restPost($params) {
          $STOP_ID = array_shift($params);
          $STOP_TYPE = array_shift($params);
          $X = array_shift($params);
          $Y = array_shift($params);
          $LAST_UPDATE_DATE = array_shift($params);

if($STOP_ID==""||$STOP_TYPE==""||$X==""||$Y==""||$LAST_UPDATE_DATE=="") {
	$error = (object) array();
	$error->ERROR='please input the field';
	echo json_encode($error);	
    
}else{
$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db );
  
$sql = "INSERT INTO stopbus (STOP_ID,STOP_TYPE,X,Y,LAST_UPDATE_DATE)
VALUES ('" . $STOP_ID . "','" . $STOP_TYPE . "','" . $X . "','" . $Y . "','" . $LAST_UPDATE_DATE . "')";

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
    
$sql = "DELETE FROM stopbus WHERE STOP_ID = $keyword";


if ($conn->query($sql) === TRUE) {
    echo " delete successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	   }
        
    }
          
}