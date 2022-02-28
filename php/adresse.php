<?php

$c = file_get_contents('http://127.0.0.1/order/json/address.json');
$decode = json_decode($c);

$decode->firstName->value=$_POST['vorname'];
$decode->lastName->value=$_POST['name'];
$decode->plz->value=$_POST['postleitzahl'];
$decode->street->value=$_POST['straße'];
$decode->email->value=$_POST['email'];
$decode->streetnumber->value=$_POST['hnummer'];

$json = json_encode( $decode );

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1/order/connector.php/validateAdress");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);

// Execute the POST request
$result = curl_exec($ch);

// Close cURL resource
curl_close($ch);

header("Location: http://localhost/website/bezahlen.html");
exit();
?>