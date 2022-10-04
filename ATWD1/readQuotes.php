<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "atwd";
$conn = mysqli_connect($hostname, $username, $password, $db )
                or die(mysqli_connect_error()); 

$domTree = new DOMDocument();
$domTree->load('ROUTE.xml');

$routeArray = $domTree->getElementsByTagName("ROUTE");

$routesArray = array();

foreach ($routeArray as $r) {
	$ROUTEIDArray = $r->getElementsByTagName('ROUTE_ID');
	$ROUTEIDNode = $ROUTEIDArray->item(0);
	$ROUTEIDValue = $ROUTEIDNode->nodeValue;
    
	$COMPANYCODEArray = $r->getElementsByTagName("COMPANY_CODE");
	$COMPANYCODENode = $COMPANYCODEArray->item(0); 
	$COMPANYCODEValue = $COMPANYCODENode->nodeValue;

	$ROUTENAMECArray = $r->getElementsByTagName("ROUTE_NAMEC");
	$ROUTENAMECNode = $ROUTENAMECArray->item(0); 
	$ROUTENAMECValue = $ROUTENAMECNode->nodeValue;
	
	$ROUTENAMESArray = $r->getElementsByTagName("ROUTE_NAMES");
	$ROUTENAMESNode = $ROUTENAMESArray->item(0); 
	$ROUTENAMESValue = $ROUTENAMESNode->nodeValue;
	
	$ROUTENAMEEArray = $r->getElementsByTagName("ROUTE_NAMEE");
	$ROUTENAMEENode = $ROUTENAMEEArray->item(0); 
	$ROUTENAMEEValue = $ROUTENAMEENode->nodeValue;
    
    $ROUTETYPEArray = $r->getElementsByTagName("ROUTE_TYPE");
	$ROUTETYPENode = $ROUTETYPEArray->item(0); 
	$ROUTETYPEValue = $ROUTETYPENode->nodeValue;
	
    $SERVICEMODEArray = $r->getElementsByTagName("SERVICE_MODE");
	$SERVICEMODENode = $SERVICEMODEArray->item(0); 
	$SERVICEMODEValue = $SERVICEMODENode->nodeValue;
	
    $SPECIALTYPEArray = $r->getElementsByTagName("SPECIAL_TYPE");
	$SPECIALTYPENode = $SPECIALTYPEArray->item(0); 
	$SPECIALTYPEValue = $SPECIALTYPENode->nodeValue;
	
    $JOURNEYTIMEArray = $r->getElementsByTagName("JOURNEY_TIME");
	$JOURNEYTIMENode = $JOURNEYTIMEArray->item(0); 
	$JOURNEYTIMEValue = $JOURNEYTIMENode->nodeValue;
	
    $LOCSTARTNAMECArray = $r->getElementsByTagName("LOC_START_NAMEC");
	$LOCSTARTNAMECNode = $LOCSTARTNAMECArray->item(0); 
	$LOCSTARTNAMECValue = $LOCSTARTNAMECNode->nodeValue;
	
    $LOCSTARTNAMESArray = $r->getElementsByTagName("LOC_START_NAMES");
	$LOCSTARTNAMESNode = $LOCSTARTNAMESArray->item(0); 
	$LOCSTARTNAMESValue = $LOCSTARTNAMESNode->nodeValue;
	
    $LOCSTARTNAMEEArray = $r->getElementsByTagName("LOC_START_NAMEE");
	$LOCSTARTNAMEENode = $LOCSTARTNAMEEArray->item(0); 
	$LOCSTARTNAMEEValue = $LOCSTARTNAMEENode->nodeValue;
	
    $LOCENDNAMECArray = $r->getElementsByTagName("LOC_END_NAMEC");
	$LOCENDNAMECNode = $LOCENDNAMECArray->item(0); 
	$LOCENDNAMECValue = $LOCENDNAMECNode->nodeValue;
	
    $LOCENDNAMESArray = $r->getElementsByTagName("LOC_END_NAMES");
	$LOCENDNAMESNode = $LOCENDNAMESArray->item(0); 
	$LOCENDNAMESValue = $LOCENDNAMESNode->nodeValue;
	
    $LOCENDNAMEEArray = $r->getElementsByTagName("LOC_END_NAMEE");
	$LOCENDNAMEENode = $LOCENDNAMEEArray->item(0); 
	$LOCENDNAMEEValue = $LOCENDNAMEENode->nodeValue;
	
    $HYPERLINKCArray = $r->getElementsByTagName("HYPERLINK_C");
	$HYPERLINKCNode = $HYPERLINKCArray->item(0); 
	$HYPERLINKCValue = $HYPERLINKCNode->nodeValue;
	
    $HYPERLINKSArray = $r->getElementsByTagName("HYPERLINK_S");
	$HYPERLINKSNode = $HYPERLINKSArray->item(0); 
	$HYPERLINKSValue = $HYPERLINKSNode->nodeValue;
    
    $HYPERLINKEArray = $r->getElementsByTagName("HYPERLINK_E");
	$HYPERLINKENode = $HYPERLINKEArray->item(0); 
	$HYPERLINKEValue = $HYPERLINKENode->nodeValue;
    
    $FULLFAREArray = $r->getElementsByTagName("FULL_FARE");
	$FULLFARENode = $FULLFAREArray->item(0); 
	$FULLFAREValue = $FULLFARENode->nodeValue;
    
    $LASTUPDATEDATEArray = $r->getElementsByTagName("LAST_UPDATE_DATE");
	$LASTUPDATEDATENode = $LASTUPDATEDATEArray->item(0); 
	$LASTUPDATEDATEValue = $LASTUPDATEDATENode->nodeValue;
	
    
	
	$routesArray[] = array(
			'ROUTE_ID' => $ROUTEIDValue,
			'COMPANY_CODE' => $COMPANYCODEValue,
			'ROUTE_NAMEC' => $ROUTENAMECValue,
			'ROUTE_NAMES' => $ROUTENAMESValue,
			'ROUTE_NAMEE' => $ROUTENAMEEValue,
            'ROUTE_TYPE' => $ROUTETYPEValue,
            'SERVICE_MODE' => $SERVICEMODEValue,
            'SPECIAL_TYPE' => $SPECIALTYPEValue,
            'JOURNEY_TIME' => $JOURNEYTIMEValue,
            'LOC_START_NAMEC' => $LOCSTARTNAMECValue,
            'LOC_START_NAMES' => $LOCSTARTNAMESValue,
            'LOC_START_NAMEE' => $LOCSTARTNAMEEValue,
            'LOC_END_NAMEC' => $LOCENDNAMECValue,
            'LOC_END_NAMES' => $LOCENDNAMESValue,
            'LOC_END_NAMEE' => $LOCENDNAMEEValue,
            'HYPERLINK_C' => $HYPERLINKCValue,
            'HYPERLINK_S' => $HYPERLINKSValue,
            'HYPERLINK_E' => $HYPERLINKEValue,
            'FULL_FARE' => $FULLFAREValue,
            'LAST_UPDATE_DATE' => $LASTUPDATEDATEValue
		);		




$sql = "INSERT INTO route (ROUTE_ID,COMPANY_CODE,ROUTE_NAMEC,ROUTE_NAMES,ROUTE_NAMEE,ROUTE_TYPE,SERVICE_MODE,SPECIAL_TYPE,JOURNEY_TIME,LOC_START_NAMEC,LOC_START_NAMES,LOC_START_NAMEE,LOC_END_NAMEC,LOC_END_NAMES,LOC_END_NAMEE,HYPERLINK_C,HYPERLINK_S,HYPERLINK_E,FULL_FARE,LAST_UPDATE_DATE)
VALUES ('".$ROUTEIDValue."','".$COMPANYCODEValue."','".$ROUTENAMECValue."','".$ROUTENAMESValue."','".$ROUTENAMEEValue."','".$ROUTETYPEValue."','".$SERVICEMODEValue."','".$SPECIALTYPEValue."','".$JOURNEYTIMEValue."','".$LOCSTARTNAMECValue."','".$LOCSTARTNAMESValue."','".$LOCSTARTNAMEEValue."','".$LOCENDNAMECValue."','".$LOCENDNAMESValue."','".$LOCENDNAMEEValue."','".$HYPERLINKCValue."','".$HYPERLINKSValue."','".$HYPERLINKEValue."','".$FULLFAREValue."','".$LASTUPDATEDATEValue."')";

$result = mysqli_query($conn, $sql);
    
    }

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


    
?>
