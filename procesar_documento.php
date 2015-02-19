<?php 
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
include_once("pg.php");
$doc = new Documento();
$doc->initializeByPost();
echo json_encode($doc->save());
?>