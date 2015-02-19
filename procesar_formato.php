<?php 
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
include_once("pg.php");
$doc = new Formato();
$doc->initializeByPost();
echo json_encode($doc->save());
?>