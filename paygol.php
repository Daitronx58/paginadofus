<?php
//$_POST = json_decode(file_get_contents('php://input'), true);
//file_put_contents("post.log", print_r($_POST, true));

$line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]";
file_put_contents('visitors.log', $line . PHP_EOL, FILE_APPEND);

$jsonFile="php://input";
$jsondata = file_get_contents($jsonFile);
$data = json_decode($jsondata, true);

//$array_data = $data['payment'];

//require 'inc/config.php';


$servername = "186.64.120.164";
$database = "deca_auth";
$username = "tempesta";
$password = "Pd159159456";

$serviceid = $data['service_id'];
$estado = $data['status'];
$cuenta = $data['custom'];
$precio = $data['price'];

// Esto puede dar problemas
//if(!in_array($_SERVER['REMOTE_ADDR'],
//	  array('109.70.3.48', '109.70.3.146', '109.70.3.58', '31.45.23.9', '104.22.55.253', '196.17.15.113'))) {
//	  header("HTTP/1.0 403 Forbidden");
//	  die("Error: Unknown IP");
//	}
	
if($serviceid != '478816') {
	header("HTTP/1.0 403 Forbidden");
	die("Error: serviceid incorrecto.");
}

if($estado != 'completed') {
	header("HTTP/1.0 403 Forbidden");
	die("Error: pago no completado.");
}

// Precio a Cantidad
if($precio == '200')
{
	$cantidad = '80000';
}
else if($precio == '150')
{
	$cantidad = '60000';
}
else if($precio == '100')
{
	$cantidad = '30000';
}
else if($precio == '50')
{
	$cantidad = '12500';
}
else if($precio == '24')
{
	$cantidad = '4800';
}
else if($precio == '12')
{
	$cantidad = '2200';
}
else if($precio == '6')
{
	$cantidad = '1000';
}
else
{
	$cantidad = '0';
}

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE accounts SET Ogrinas=CONCAT(Ogrinas+".$cantidad.") WHERE Login='". $cuenta ."'";
$conn->query($sql);

?>
