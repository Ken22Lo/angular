<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db )
                or die(mysqli_connect_error()); 



ini_set('max_execution_time' , 800);

$domTree = new DOMDocument();
$domTree->load('RSTOP_BUS.xml');

$rstopArray = $domTree->getElementsByTagName("RSTOP");

$rstopsArray = array();

foreach ($rstopArray as $r) {
	$ROUTEIDArray = $r->getElementsByTagName('ROUTE_ID');
	$ROUTEIDNode = $ROUTEIDArray->item(0);
	$ROUTEIDValue = $ROUTEIDNode->nodeValue;

	$ROUTESEQArray = $r->getElementsByTagName("ROUTE_SEQ");
	$ROUTESEQNode = $ROUTESEQArray->item(0); 
	$ROUTESEQValue = $ROUTESEQNode->nodeValue;

	$STOPSEQArray = $r->getElementsByTagName("STOP_SEQ");
	$STOPSEQNode = $STOPSEQArray->item(0); 
	$STOPSEQValue = $STOPSEQNode->nodeValue;
	
	$STOPIDArray = $r->getElementsByTagName("STOP_ID");
	$STOPIDNode = $STOPIDArray->item(0); 
	$STOPIDValue = $STOPIDNode->nodeValue;
	
	$STOPPICKDROPArray = $r->getElementsByTagName("STOP_PICK_DROP");
	$STOPPICKDROPNode = $STOPPICKDROPArray->item(0); 
	$STOPPICKDROPValue = $STOPPICKDROPNode->nodeValue;
    
    $STOPNAMECArray = $r->getElementsByTagName("STOP_NAMEC");
	$STOPNAMECNode = $STOPNAMECArray->item(0); 
	$STOPNAMECValue = $STOPNAMECNode->nodeValue;
	
    $STOPNAMESArray = $r->getElementsByTagName("STOP_NAMES");
	$STOPNAMESNode = $STOPNAMESArray->item(0); 
	$STOPNAMESValue = $STOPNAMESNode->nodeValue;
	
    $STOPNAMEEArray = $r->getElementsByTagName("STOP_NAMEE");
	$STOPNAMEENode = $STOPNAMEEArray->item(0); 
	$STOPNAMEEValue = $STOPNAMEENode->nodeValue;
	
    $LASTUPDATEDATEArray = $r->getElementsByTagName("LAST_UPDATE_DATE");
	$LASTUPDATEDATENode = $LASTUPDATEDATEArray->item(0); 
	$LASTUPDATEDATEValue = $LASTUPDATEDATENode->nodeValue;
	
   
	$rstopsArray[] = array(
			'ROUTE_ID' => $ROUTEIDValue,
			'ROUTE_SEQ' => $ROUTESEQValue,
			'STOP_SEQ' => $STOPSEQValue,
			'STOP_ID' => $STOPIDValue,
			'STOP_PICK_DROP' => $STOPPICKDROPValue,
            'STOP_NAMEC' => $STOPNAMECValue,
            'STOP_NAMES' => $STOPNAMESValue,
            'STOP_NAMEE' => $STOPNAMEEValue,
            'LAST_UPDATE_DATE' => $LASTUPDATEDATEValue

		);		




$sql = "INSERT INTO rstop(ROUTE_ID,ROUTE_SEQ,STOP_SEQ,STOP_ID,STOP_PICK_DROP,STOP_NAMEC,STOP_NAMES,STOP_NAMEE,LAST_UPDATE_DATE) VALUES 
('" .$ROUTEIDValue. "','" .$ROUTESEQValue. "','" .$STOPSEQValue. "','" .$STOPIDValue. "','" .$STOPPICKDROPValue. "','" .$STOPNAMECValue. "',
'"  .$STOPNAMESValue."','"  .$STOPNAMEEValue."','"  .$LASTUPDATEDATEValue."')";

$result = mysqli_query($conn, $sql);
    
    }

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>