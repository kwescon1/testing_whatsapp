<?php
require_once './vendor/autoload.php';

use Twilio\Twiml;



$message = $twilio->messages
   ->create("whatsapp:".env("MY_WHATSAPP_NUMBER"),
       [
           "body" => "Welcome to my bot. Please input your name ",
           "from" => "whatsapp:".env("TWILIO_WHATSAPP_NUMBER")
       ]

   );

//print($message->sid);

$response = new Twiml;
$name = $_REQUEST['body'];
//$pick = rand(1,5);
$names = ["odame","kwesi","danquah"];

if (!in_array($name, ["odame","kwesi","danquah"])) {
   $response->message("Please you were not picked for the schorlaship");
} elseif ($name == $names) {
   $response->message("Please enter your age");
} 

$age = $_REQUEST['body'];
if ($age >= 15 && $age <=25){
	$response->message("You have passed the nerd test");
} elseif ($age < 15) {
	$response->message("You are way too young for this test");
}

else {
   $response->message("Your kind of breed was not found.!");
}

print $response;