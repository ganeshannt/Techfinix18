<?php
ob_start();
session_start();  
include_once 'dbconnect.php';
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}
$stmt=$conn->prepare('select * from event');
$stmt->execute();


$columnHeader ='';
$columnHeader = "name"."\t"."mail"."\t"."phone"."\t"."college"."\t"."gender"."\t"."dept"."de"."ce";


$setData='';

while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Book record sheet.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".$setData."\n";

?>
