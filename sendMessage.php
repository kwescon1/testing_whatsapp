<?php

require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// $dotenv = new Dotenv\Dotenv("whatsapp");
// $dotenv->load();

//Twilio Account Sid and Auth Token
$sid = "AC306305869b25a06c6e4150fcdcfd1b28";
$token = "d309208aed66ee8cb27be154c5618c01";
$twilio = new Client($sid, $token);

$codes = ["chocolate", "vanilla", "strawberry", "mint-chocolate-chip", "cookies-n-cream"];

$message = $twilio->messages
	->create("whatsapp:+14155238886",
		[
		"body" => "Your ice-cream code is ". $codes[rand(0,4)],
		"from" => "whatsapp:+14155238886"
	]

);

print($message->sid);
?>