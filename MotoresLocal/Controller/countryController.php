<?php
$host = "localhost";
$uname = "root";
$pass = "123456"; //Rafael Lizarazo Agregado pass de DB
$database = "motores";

$connection=mysql_connect($host,$uname,$pass) or die("connection in not ready <br>");
$result=mysql_select_db($database) or die("database cannot be selected <br>");

if (isset($_REQUEST['query'])) {

	$query = $_REQUEST['query'];
	
	$sql = mysql_query ("SELECT * FROM  qro_cp_cities WHERE country LIKE '%{$query}%' or city LIKE '%{$query}%'  or airportCode LIKE '%{$query}%' ");
	$array = array();
	
	while ($row = mysql_fetch_assoc($sql)) {
		$array[] = $row['airportCode'];
		
	}
	
	echo json_encode ($array); //Return the JSON Array

}

?>
