<?php
$c = file_get_contents('http://127.0.0.1/order/json/payOption.json');
$decode = json_decode($c, true);

if(isset($_POST['buttonAdresse'])){
	$decode = json_encode($decode[1]);
	$decode = json_decode($decode);
	$decode->input1->value=$_POST['Nummer'];
	$decode->input2->value=$_POST['Ablaufdatum'];
	$decode->input3->value=$_POST['CCV'];
	$json = json_encode( $decode[1] );
}
else{
	$decode = json_encode($decode[0]);
	$decode = json_decode($decode);
	$decode->input1->value=$_POST['IBAN'];
	$decode->input2->value=$_POST['BIC'];
	$json = json_encode( $decode );

}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1/order/connector.php/validatePayment");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);

// Execute the POST request
$result = curl_exec($ch);

// Close cURL resource
curl_close($ch);




$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1/order/connector.php/takeOrder');

  // Do not check the SSL certificates
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  // Return the actual result of the curl result instead of success code
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  curl_close($ch);


header("Location: http://localhost/website/finished.html");
exit();
?>