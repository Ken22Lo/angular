<?php

$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'atwd';
$connect = new mysqli($host, $user, $passwd, $database);

$affectedRow = 0;

$domTree = new DOMDocument();
$domTree->load('STOP_BUS.xml');

$STOPArray = $domTree->getElementsByTagName("STOP");

$STOPsArray = array();

foreach ($STOPArray as $s) {
    $STOPIDArray = $s->getElementsByTagName('STOP_ID');
    $STOPIDNode = $STOPIDArray->item(0);
    $STOPIDValue = $STOPIDNode->nodeValue;

    $STOPTYPEArray = $s->getElementsByTagName("STOP_TYPE");
    $STOPTYPENode = $STOPTYPEArray->item(0);
    $STOPTYPEValue = $STOPTYPENode->nodeValue;

    $XArray = $s->getElementsByTagName("X");
    $XNode = $XArray->item(0);
    $XValue = $XNode->nodeValue;

    $YArray = $s->getElementsByTagName("Y");
    $YNode = $YArray->item(0);
    $YValue = $YNode->nodeValue;

    $LASTUPDATEDATEArray = $s->getElementsByTagName("LAST_UPDATE_DATE");
    $LASTUPDATEDATENode = $LASTUPDATEDATEArray->item(0);
    $LASTUPDATEDATEValue = $LASTUPDATEDATENode->nodeValue;


    $STOPsArray[] = array(
            'STOP_ID' => $STOPIDValue,
            'STOP_TYPE' => $STOPTYPEValue,
            'X' => $XValue,
            'Y' => $YValue,
            'LAST_UPDATE_DATE' => $LASTUPDATEDATEValue,
        );

    $sql = "INSERT INTO stopbus(STOP_ID,STOP_TYPE,X,Y,LAST_UPDATE_DATE) VALUES ('" . $STOPIDValue . "','" . $STOPTYPEValue . "','" . $XValue . "','" . $YValue . "','" . $LASTUPDATEDATEValue . "')";

    $result = mysqli_query($connect, $sql);

    if (! empty($result)) {
        $affectedRow ++;


}
}
?>